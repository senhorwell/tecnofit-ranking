<?php

namespace App\Http\Controllers;
use App\Models\Record;
use App\Models\Movement;
use App\Models\User;

use Request;

class RankingController extends Controller
{
    public function getDeadlift(){
        $todos = Record::with('usuario','movimento')->where('movement_id',1)->orderBy('value', 'desc')->get();
        $users = User::all();
        return view('deadlift', ['records' => $todos,'users' => $users]);
    }
    public function getBacksquat(){
        $todos = Record::with('usuario','movimento')->where('movement_id',2)->orderBy('value', 'desc')->get();
        $users = User::all();

        return view('backsquat', ['records' => $todos,'users' => $users]);
    }
    public function getBenchpress(){
        $todos = Record::with('usuario','movimento')->where('movement_id',3)->orderBy('value', 'desc')->get();
        $users = User::all();
        return view('benchpress', ['records' => $todos,'users' => $users]);
    }
    public function getDeadliftDados(){
        $todos = Record::with('usuario','movimento')->where('movement_id',1)->orderBy('value', 'desc')->get();
        return $todos;
    }
    public function getBacksquatDados(){
        $todos = Record::with('usuario','movimento')->where('movement_id',2)->orderBy('value', 'desc')->get();
        return $todos;
    }
    public function getBenchpressDados(){
        $todos = Record::with('usuario','movimento')->where('movement_id',3)->orderBy('value', 'desc')->get();
        return $todos;
    }
    public function setDeadlift(){
        $post = Request::post();

        if($post["edit"] == 0){
            Record::create([
                'user_id' => $post["name"],
                'movement_id' => 1,
                'value' => $post["value"],
                'date' => $post["date"]
            ]);
        }else{
            $record = Record::find($post["record_id"]);
            $record->update([
                'user_id' => $post["name"],
                'movement_id' => 1,
                'value' => $post["value"],
                'date' => $post["date"]
            ]);
        }
        return redirect()->route('deadlift');
    }
    public function setBacksquat(){
        $post = Request::post();

        if($post["edit"] == 0){
            Record::create([
                'user_id' => $post["name"],
                'movement_id' => 2,
                'value' => $post["value"],
                'date' => $post["date"]
            ]);
        }else{
            $record = Record::find($post["record_id"]);
            $record->update([
                'user_id' => $post["name"],
                'movement_id' => 2,
                'value' => $post["value"],
                'date' => $post["date"]
            ]);
        }
        return redirect()->route('backsquat');
    }
    public function setBenchpress(){
        $post = Request::post();
        if($post["edit"] == 0){
            Record::create([
                'user_id' => $post["name"],
                'movement_id' => 3,
                'value' => $post["value"],
                'date' => $post["date"]
            ]);
        }else{
            $record = Record::find($post["record_id"]);
            $record->update([
                'user_id' => $post["name"],
                'movement_id' => 3,
                'value' => $post["value"],
                'date' => $post["date"]
            ]);
        }
        
        return redirect()->route('benchpress');
    }
    public function deleteDeadlift(){
        $post = Request::post();

        $ranking = Record::find($post["record_id"]);
        $ranking->delete();

        return;
    }
    public function deleteBacksquat(){
        $post = Request::post();

        $ranking = Record::find($post["record_id"]);
        $ranking->delete();

        return;
    }
    public function deleteBenchpress(){
        $post = Request::post();

        $ranking = Record::find($post["record_id"]);
        $ranking->delete();

        return;
    }
}
