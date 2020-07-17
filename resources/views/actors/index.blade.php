@extends('app')

@section('css')
    
@endsection


@section('content')
<div class="row">
    <div class="col-6">
        <h1 class="text-uppercase" style="width=auto;">Lista de Atores</h1>
    </div>
    <div class="col-6">
        <a href="{{ route('actors.create') }}" class="btn btn-primary float-right"  >Novo</a>
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
                    <th>Email</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($actors as $actor)
                <tr>
                    <td>{{ $actor->id }}</td>
                    <td>{{ $actor->name }}</td>
                    <td><span class="badge badge-primary">{{ $actor->movies->count() }}</span></td>
                    <td>{{$actor->email }}</td>
                    <td>
                        <a class="btn btn-success "  href="{{ route('actors.show', $actor) }}">mostrar</a>
                        <a class="btn btn-primary "  href="{{ route('actors.edit', $actor) }}">editar</a>
                    </tr>
                @empty
                <tr>
                    <td colspan="4">no records found</td>
                </tr>
                @endforelse
              
            </tbody>
        </table>
        {{ $actors->links() }}

    </div>
</div>
</div>
@endsection


@section('js')
    
@endsection