<form method="post" action="{{ route('movies.destroy', $movie) }}" onsubmit="return confirm('Você tem certeza que quer remover este Filme?');" style="display: inline-block;">
    @csrf
    @method('delete')
    <input type="hidden" name="_method" value="DELETE">
    <button class="btn btn-danger">Remover</button>
</form>