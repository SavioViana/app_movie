<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{

    private $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    
    public function index()
    {
        $movies = $this->movie->paginate(10);
        return view('movies.index', compact('movies'));
    }
    
    public function create()
    {
        $actors = Actor::all();
        $genres = Genre::all();
        return view('movies.create', compact('actors', 'genres'));
    }

    
    public function store(MovieRequest $request)
    {
        try{
            $movie = $this->movie->create(
                $request->only(['title', 'abstract'])
            );

            $movie->genres()->sync($request->genres);
            $movie->actors()->sync($request->actors);

            return redirect()->route('movies.index')->with('success', 'Filme cadastrado com sucesso');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Falha ao cadastra filme');
        }
    }

    
    public function show(movie $movie)
    {
        return view('movies.single', compact('movie'));
        
    }

   
    public function edit(Movie $movie)
    {
        $actors = Actor::all();
        $genres = Genre::all();
        // dd(  $movie->actors->pluck('id')->toArray()  );
        return view('movies.edit', compact('actors', 'genres', 'movie'));   
    }

    
    public function update(MovieRequest $request, Movie $movie)
    {
        try{
            $movie->update(
                $request->only(['title', 'abstract'])
            );

            $movie->genres()->sync($request->genres);
            $movie->actors()->sync($request->actors);

            return redirect()->route('movies.index')->with('success', 'Filme atualisado com sucesso');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Falha ao atualizar file');
        }
    }

    
    public function destroy(Movie $movie)
    {
        try{
            
            $movie->actors()->detach();
            $movie->genres()->detach();
            $movie->delete();

            return redirect()->route('movies.index')->with('success', 'Filme removido com sucesso');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Falha ao remover filme');
        }
    }
}
