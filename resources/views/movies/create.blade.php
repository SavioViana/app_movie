@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Cadastro de Filme</h1>
    <hr>

<div class="card">
<div class="card-body">
  @include('movies._form', ['action' =>  route('movies.store'), 'method' => 'POST'])
</div>
</div>
@endsection


@section('js')
    
@endsection