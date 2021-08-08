@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 pt-5">
            
            <div class="card">
            <h1 class="w-100 text-center">Deadlift</h1>
            <form class="d-flex justify-content-between flex-column flex-md-row my-4" method="post" action="{{ route('deadlift.update') }}">
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
                <input type="hidden" id="edit" name="edit" value="0">
                <input type="hidden" id="record_id" name="record_id" value="">

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
                            <td class="{{($i > 0 && $records[$i]->value == $records[$i-1]->value) ? 'border-none' : ''}} text-center d-flex justify-content-center">
                                <button value="{{$i}}" onClick="editOnClick(this)" class="btn btn-primary">Editar</button>
                                <button value="{{$records[$i]->id}}" onClick="deleteOnClick(this)" class="btn btn-secondary">Deletar</button>
                            </td>
                        </tr>    
                    @endfor
                </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function deleteOnClick(sel){
      $.ajax({
        url: "{{ route('deadlift.delete') }}",
        type:'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },  
        data: {record_id:sel.getAttribute('value')},
        success: function(data) {
            location.reload()
        }
      });
    }
    function editOnClick(sel){
      var i = sel.getAttribute('value');

      var records = {!! json_encode($records->toArray(), JSON_HEX_TAG) !!};

      $("#value").val(records[i].value);
      $("#date").val(records[i].date);
      $("#name").val(records[i].user_id);
      $("#edit").attr("value",1);
      $("#record_id").attr("value",records[i].id);
      
      document.getElementById("button").innerText = "Editar Ranking";
    }
</script>
@endsection
