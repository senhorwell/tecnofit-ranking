@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 pt-5">
            
            <div class="card">
            <h1 class="w-100 text-center">Deadlift</h1>
            <form class="d-flex justify-content-between flex-column flex-md-row my-4" method="post" action="{{ route('deadlift.registra') }}">
                @csrf    
                <div class="form-group col-12 col-md-3 px-0 px-md-2 my-md-0 py-md-0">
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" required="true">
                        <option value="0" selected> Selecione um usuario</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-3 px-0 px-md-2 my-md-0 py-md-0">
                    <input type="number" class="form-control" id="value" name="value" placeholder="Recorde pessoal">
                </div>
                <div class="form-group col-12 col-md-3 px-0 px-md-2 my-md-0 py-md-0">
                    <input type="date" class="form-control" id="date" name="date" placeholder="Data">
                </div>
                <button type="submit" class="btn btn-primary">Adicionar novo record</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th class="text-center" scope="col">Recorde Pessoal</th>
                    <th class="text-center" scope="col">Data</th>
                    <th class="text-center" scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i< sizeof($records); $i++)
                        @php ($j = ($i == 0) ? 1 : (($records[$i]->value != $records[$i-1]->value) ? $j+1 : $j))
                        
                        <tr value="{{$records[$i]->id}}">
                            <th class="{{($i > 0 && $records[$i]->value == $records[$i-1]->value) ? 'border-none' : ''}}" scope="row">{{$j}}</th>
                            <td class="{{($i > 0 && $records[$i]->value == $records[$i-1]->value) ? 'border-none' : ''}}">{{$records[$i]->usuario->name}}</td>
                            <td class="{{($i > 0 && $records[$i]->value == $records[$i-1]->value) ? 'border-none' : ''}} text-center">{{$records[$i]->value}}</td>
                            <td class="{{($i > 0 && $records[$i]->value == $records[$i-1]->value) ? 'border-none' : ''}} text-center">{{\Carbon\Carbon::parse($records[$i]->date)->format('d/m/Y')}}</td>
                            <td class="{{($i > 0 && $records[$i]->value == $records[$i-1]->value) ? 'border-none' : ''}} text-center">
                                <form id="record-edit-form" method="POST" action="{{route('deadlift')}}">
                                    @csrf
                                    <input type="hidden" name="record_id" id="record_id" value="{{$records[$i]->id}}"/>
                                    <i class="fas fa-pencil-alt"></i>
                                </form>
                                <a href="#" value="{{$records[$i]->id}}" class="btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>    
                    @endfor
                </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
    
@endsection
