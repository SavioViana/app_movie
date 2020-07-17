<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use App\Http\Requests\ActorRequest;

class ActorController extends Controller
{

    private $actor;

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    
    public function index()
    {
        $actors = $this->actor->paginate(10);
        return view('actors.index', compact('actors'));
    }

    
    public function create()
    {
        return view('actors.create');
    }

    
    public function store(ActorRequest $request)
    {
        try{
            $this->actor->create(
                $request->only(['name', 'email'])
            );

            return redirect()->route('actors.index')->with('success', 'Ator cadastrado com sucesso');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Falha ao cadastra ator');
            dd($e->getMessage());
        }
    }

    
    public function show(Actor $actor)
    {
        return view('actors.single', compact('actor'));
        
    }

   
    public function edit(Actor $actor)
    {
        
        return view('actors.edit', compact('actor'));
    }

    
    public function update(ActorRequest $request, Actor $actor)
    {
        try{
            $actor->update(
                $request->only(['name', 'email'])
            );

            return redirect()->route('actors.index')->with('success', 'Ator atualisado com sucesso');
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Falha ao atualizar ator');
        }
    }

    
    public function destroy($id)
    {
        //
    }
}
