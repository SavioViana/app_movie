@extends('app')

@section('css')
    
@endsection


@section('content')
<div class="row">
    <div class="col-6">
        <h1 class="text-uppercase" style="width=auto;">Lista de Filmes</h1>
    </div>
    <div class="col-6">
        <a href="{{ route('movies.create') }}" class="btn btn-primary float-right"  >Novo</a>
    </div>
</div>    

<div class="card">
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>resumo</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{  Str::limit($movie->abstract, 50, ' ... ') }}</td>
                    <td>
                        <a class="btn btn-success "  href="{{ route('movies.show', $movie) }}">mostrar</a>
                        <a class="btn btn-primary "  href="{{ route('movies.edit', $movie) }}">editar</a>
                        @include('movies._form-delete')
                    </tr>
                @empty
                <tr>
                    <td colspan="4">no records found</td>
                </tr>
                @endforelse
              
            </tbody>
        </table>
        {{ $movies->links() }}
    </div>
</div>
</div>
@endsection


@section('js')
    
@endsection