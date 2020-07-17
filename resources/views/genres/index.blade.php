@extends('app')

@section('css')
    
@endsection


@section('content')
<div class="row">
    <div class="col-6">
        <h1 class="text-uppercase" style="width=auto;">Lista de Generos de Filmes</h1>
    </div>
    <div class="col-6">
        <a href="{{ route('genres.create') }}" class="btn btn-primary float-right"  >Novo</a>
    </div>
</div>    

<div class="card">
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Filmes</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td><span class="badge badge-primary">{{ $genre->movies->count() }}</span></td>
                    <td>
                        <a class="btn btn-success "  href="{{ route('genres.show', $genre) }}">mostrar</a>
                        <a class="btn btn-primary "  href="{{ route('genres.edit', $genre) }}">editar</a>
                    </tr>
                @empty
                <tr>
                    <td colspan="4">no records found</td>
                </tr>
                @endforelse
              
            </tbody>
        </table>
        {{ $genres->links() }}

    </div>
</div>
</div>
@endsection


@section('js')
    
@endsection