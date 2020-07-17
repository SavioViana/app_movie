@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Dados do Ator</h1>
    <hr>
<div class="card">
<div class="card-body">

    <table class="table">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $actor->name }}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{$actor->name }}</td>
            </tr>
            <tr>
                <th>Quantidades de filmes</th>
                <td><span class="badge badge-primary">{{ $actor->movies->count() }}</span></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td>{{ $actor->email }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('actors.index') }}">Voltar para listagem</a>

    <a  class="btn btn-primary float-right ml-3"  href="{{ route('actors.edit', $actor) }}">Editar</a>
</div>
</div>
@endsection


@section('js')
    
@endsection