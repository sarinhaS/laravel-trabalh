<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nome' => 'Ficção Científica']);
        Categoria::create(['nome' => 'Terror']);
        Categoria::create(['nome' => 'Suspense']);
        Categoria::create(['nome' => 'Comédia']);
        Categoria::create(['nome' => 'Ação']);
        Categoria::create(['nome' => 'Drama']);
    }
}
