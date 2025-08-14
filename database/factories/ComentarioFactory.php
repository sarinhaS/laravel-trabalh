<?php

namespace Database\Factories;

use App\Models\Filme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    protected $model = Comentario::class;

    public function definition(): array
    {
        return [
            'autor' => fake()->name(),
            'conteudo' => fake()->realText(500),
        ];
    }
}
