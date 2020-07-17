@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Cadastro de ator</h1>
    <hr>

<div class="card">
<div class="card-body">
  @include('actors._form', ['action' =>  route('actors.store'), 'method' => 'POST'])
</div>
</div>
@endsection


@section('js')
    
@endsection