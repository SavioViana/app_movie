<form method="POST" action="{{ $action }}" >
    @method($method)
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" id="title" placeholder="" value=" {{ old('title', $movie->title ?? null)  }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="genres">Generos</label>
                <select class="form-control selectpicker  @error('genres') is-invalid @enderror" name="genres[]"  multiple title="Selecione um ou mais generos">
                 
                    @foreach ($genres as $genre)
                    @if ( isset($movie))
                        <option {{ ( collect( old('genres',  $movie->genres->pluck('id')->toArray() ) )->contains($genre->id) ) ? 'selected' : '' }}  value="{{ $genre->id }}" data-content="<span class='badge badge-primary'>{{ $genre->name }}</span>"></option>
                    @else
                        <option {{ ( collect( old('genres', null  ) )->contains($genre->id) ) ? 'selected' : '' }}  value="{{ $genre->id }}" data-content="<span class='badge badge-primary'>{{ $genre->name }}</span>"></option>
                    @endif
                    @endforeach
                </select>
                @error('genres')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="actors">Elenco</label>
                <select class="form-control selectpicker  @error('actors') is-invalid @enderror" name="actors[]" multiple title="Selecione um ou mais atores" value="">
                    @foreach ($actors as $actor)
                    @if (isset($movie))
                        <option {{ ( collect( old('actors',   $movie->actors->pluck('id')->toArray() ?? null ) )->contains($actor->id) ) ? 'selected' : '' }}  value="{{ $actor->id }}" data-content="<span class='badge badge-primary'>{{ $actor->name }}</span>"></option>
                    @else
                        <option {{ ( collect( old('actors', null ) )->contains($actor->id) ) ? 'selected' : '' }}   value="{{ $actor->id }}" data-content="<span class='badge badge-primary'>{{ $actor->name }}</span>"></option>
                    @endif
                    @endforeach
                </select>
                @error('actors')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="abstract">Resumo</label>
                <textarea class="form-control  @error('abstract') is-invalid @enderror " name="abstract" id="abstract" rows="3">{{ old('abstract', $movie->abstract ?? null)  }}</textarea>
                @error('abstract')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
        </div>
    </div>
   
   
    <a href="{{ route('movies.index') }}">Voltar para listagem</a>
    <button class="btn btn-success float-right">Salvar</button>
</form>