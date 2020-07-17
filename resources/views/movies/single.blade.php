@extends('app')

@section('css')
    
@endsection


@section('content')
    <h1 class="text-uppercase" style="width=auto;">Dados do Filme</h1>
    <hr>
<div class="card">
<div class="card-body">

    <table class="table">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $movie->id }}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{$movie->title }}</td>
            </tr>
            <tr>
                <th>Generos</th>
                <td>
                    <ul class="pl-3">
                        @foreach ($movie->genres as $genre)
                            <li><span class="badge badge-primary">{{ $genre->name }}</span></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Elenco</th>
                <td>
                    <ul class="pl-3">
                        @foreach ($movie->actors as $actor)
                        <li><span class="badge badge-primary">{{ $actor->name }}</span></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td>{{ $movie->abstract }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('movies.index') }}">Voltar para listagem</a>

    <a  class="btn btn-primary float-right ml-3"  href="{{ route('movies.edit', $movie) }}">Editar</a>
</div>
</div>
@endsection


@section('js')
    
@endsection