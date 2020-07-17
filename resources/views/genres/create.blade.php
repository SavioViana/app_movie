@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Cadastro de Genero</h1>
    <hr>

<div class="card">
<div class="card-body">
  @include('genres._form', ['action' =>  route('genres.store'), 'method' => 'POST'])
</div>
</div>
@endsection


@section('js')
    
@endsection