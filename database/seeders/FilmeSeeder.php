<?php

namespace Database\Seeders;

use App\Models\Filme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filme::create([
            'nome' => 'Coraline',
            'sinopse' =>  'Coraline descobre uma porta para um mundo alternativo onde tudo parece perfeito, pais afetuosos e desejos realizados. Porém todos têm botões nos olhos, e logo percebe que essa realidade paralela esconde intenções sombrias para mantê-la presa.',
            'ano'=> '2009',
            'categorias_id' => 1,
            'imagem' => '/filmes/coraline.webp',
            'trailer' => 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjl--vcy4iPAxV_ILkGHeMmDHgQryQoAHoECDwQAQ&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DP8lfdvXkhu0&usg=AOvVaw3AmFSe0ErkOtmHT2T7EjlI&opi=89978449',
        ]);

        Filme::create([
            'nome' => 'Toy Story',
            'sinopse' => 'Woody, um cowboy de brinquedo, sente-se ameaçado quando Buzz Lightyear, um novo brinquedo espacial, chega e se torna o favorito de Andy. Juntos, eles aprendem sobre amizade e trabalho em equipe.',
            'ano' => '1995',
            'categorias_id' => 1,
            'imagem' => '/filmes/toystory.webp',
            'trailer' => 'https://www.youtube.com/watch?v=KYz2wyBy3kc',
        ]);

        Filme::create([
            'nome' => 'Up: Altas Aventuras',
            'sinopse' => 'Carl Fredricksen, um idoso viúvo, embarca numa aventura aérea amarrando milhares de balões à sua casa. Com ele vai o jovem escoteiro Russell, vivendo encontros emocionantes e inesquecíveis.',
            'ano' => '2009',
            'categorias_id' => 1,
            'imagem' => '/filmes/upaltasaventuras.webp',
            'trailer' => 'https://www.youtube.com/watch?v=pkqzFUhGPJg',
        ]);

        Filme::create([
            'nome' => 'A Viagem de Chihiro',
            'sinopse' => 'Chihiro, uma menina de 10 anos, se vê presa em um mundo mágico cheio de espíritos e deuses. Para salvar seus pais transformados em porcos, ela precisa enfrentar desafios e crescer em coragem e sabedoria.',
            'ano' => '2001',
            'categorias_id' => 5,
            'imagem' => 'filmes/chihiro.jpg',
            'trailer' => 'https://www.youtube.com/watch?v=ByXuk9QqQkk',
        ]);
    }
}
