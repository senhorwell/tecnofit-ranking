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
        return view('deadlift', ['records' => $todos]);
    }
    public function getBacksquat(){
        $todos = Record::with('usuario','movimento')->where('movement_id',2)->orderBy('value', 'desc')->get();
        return view('backsquat', ['records' => $todos]);
    }
    public function getBenchpress(){
        $todos = Record::with('usuario','movimento')->where('movement_id',3)->orderBy('value', 'desc')->get();
        return view('benchpress', ['records' => $todos]);
    }
}
