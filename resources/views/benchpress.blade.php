@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 pt-5">
            <div class="card">
            <h1 class="w-100 text-center">Bench Press</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th class="text-center" scope="col">Recorde Pessoal</th>
                    <th class="text-center" scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr value="{{$record->id}}">
                            <th scope="row">{{$record->id}}</th>
                            <td>{{$record->usuario->name}}</td>
                            <td class="text-center">{{$record->value}}</td>
                            <td class="text-center">{{\Carbon\Carbon::parse($record->date)->format('d/m/Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection
