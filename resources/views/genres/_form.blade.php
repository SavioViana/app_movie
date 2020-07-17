<form method="POST" action="{{ $action }}" >
    @method($method)
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nome</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name" placeholder="" value=" {{ old('name', $genre->name ?? null)  }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
   
    <div class="form-group">
      <label for="description">Descrição</label>
      <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="" value=" {{ old('description', $genre->description ?? null)  }}">
      @error('description')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <a href="{{ route('genres.index') }}">Voltar para listagem</a>
    <button class="btn btn-success float-right">Salvar</button>
</form>