@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 pt-5">
            <div class="card">
            <h1 class="w-100 text-center">Deadlift</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Recorde Pessoal</th>
                    <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>3414124</td>
                    <td>05/08/2021</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob<br>Gut</td>
                    <td>3124124<br>123431241</td>
                    <td>05/08/2021<br>05/08/2021</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>143214</td>
                    <td>05/08/2021</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
