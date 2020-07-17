<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{

    private $genre;

    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
    }

    
    public function index()
    {
        $genres = $this->genre->paginate(10);
        return view('genres.index', compact('genres'));
    }

    
    public function create()
    {
        return view('genres.create');
    }

    
    public function store(GenreRequest $request)
    {
    
        try{
            $this->genre->create(
                $request->only(['name', 'description'])
            );

            return redirect()->route('genres.index')->with('success', 'Genero cadastrado com sucesso');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Falha ao cadastra genero');
        }
    }

    
    public function show(Genre $genre)
    {
        return view('genres.single', compact('genre'));
        
    }

   
    public function edit(Genre $genre)
    {
        
        return view('genres.edit', compact('genre'));
    }

    
    public function update(GenreRequest $request, Genre $genre)
    {
        try{
            $genre->update(
                $request->only(['name', 'email'])
            );

            return redirect()->route('genres.index')->with('success', 'Genero atualisado com sucesso');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Falha ao atualizar genero');
        }
    }

    
    public function destroy($id)
    {
        //
    }
}
