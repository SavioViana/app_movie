<form method="POST" action="{{ $action }}" >
    @method($method)
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nome</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name" placeholder="" value=" {{ old('name', $actor->name ?? null)  }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
   
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="" value=" {{ old('email', $actor->email ?? null)  }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <a href="{{ route('actors.index') }}">Voltar para listagem</a>
    <button class="btn btn-success float-right">Salvar</button>
</form>