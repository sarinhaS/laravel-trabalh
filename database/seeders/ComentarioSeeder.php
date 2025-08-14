<?php

namespace Database\Seeders;

use App\Models\Comentario;
use App\Models\Filme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filmes = Filme::all();

        foreach ($filmes as $filme) {
            Comentario::factory()
                ->count(10) 
                ->create([
                    'filme_id' => $filme->id, 
                ]);
        }
    }
}
