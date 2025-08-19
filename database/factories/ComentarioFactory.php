<?php
namespace Database\Factories;

use App\Models\Comentario; // ✅ faltava isso
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    public function definition(): array
    {
        return [
            'autor' => fake()->name(),
            'conteudo' => fake()->realText(100),
        ];
    }
}
