@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Dados do genero</h1>
    <hr>
<div class="card">
<div class="card-body">

    <table class="table">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $genre->id }}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{$genre->name }}</td>
            </tr>
            <tr>
                <th>Quantidades de Filmes</th>
                <td><span class="badge badge-primary">{{ $genre->movies->count() }}</span></td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td>{{ $genre->description }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('genres.index') }}">Voltar para listagem</a>

    <a  class="btn btn-primary float-right ml-3"  href="{{ route('genres.edit', $genre) }}">Editar</a>
</div>
</div>
@endsection


@section('js')
    
@endsection