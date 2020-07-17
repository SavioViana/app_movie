@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Editar Filme</h1>
    <hr>
<div class="card">
<div class="card-body">

  @include('movies._form', ['action' =>  route('movies.update', $movie), 'method' => 'put'])
  
</div>
</div>
@endsection


@section('js')
    
@endsection