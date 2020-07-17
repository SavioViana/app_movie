<?php

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $file = file_get_contents(base_path('selecao.xml') );
        $xml = simplexml_load_string($file);

        foreach ($xml->filme as $key => $filme) {

            $movie = Movie::create([
                'title' => $filme->titulo,
                'abstract' => $filme->resumo,
            ]);
            
            $movieGenres = [];
            foreach ($filme->genero as $key => $genero) {
                $genre = Genre::where('name', $genero)->first();

                if (!$genre) {
                    $genre = Genre::create([
                        'name' => $genero
                    ]);
                } 
                $movieGenres[] = $genre;
            }
            
            $movieGenresIds = collect( $movieGenres )->pluck('id')->toArray();
            $movie->genres()->sync($movieGenresIds);

            $movieActors = [];
            foreach ($filme->elenco->ator as $key => $ator) {

                $actor = Actor::where('name', $genero)->first();
                if (!$actor) {
                    $actor = Actor::create([
                        'name' => $ator
                    ]);
                }

                $movieActors[] = $actor;
            }

            $movieActorsIds = collect( $movieActors )->pluck('id')->toArray();
            $movie->actors()->sync($movieActorsIds);
        }
    }
}
