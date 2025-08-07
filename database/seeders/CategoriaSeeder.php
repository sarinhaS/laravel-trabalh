<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nome' => 'Ação']);
        Categoria::create(['nome' => 'Comédia']);
        Categoria::create(['nome' => 'Terror']);
        Categoria::create(['nome' => 'Suspense']);
    }
}
