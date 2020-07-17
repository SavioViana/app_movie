@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Editar Genero</h1>
    <hr>
<div class="card">
<div class="card-body">

  @include('genres._form', ['action' =>  route('genres.update', $genre), 'method' => 'put'])
  
</div>
</div>
@endsection


@section('js')
    
@endsection