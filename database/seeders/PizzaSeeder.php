<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nome' => 'Margherita',
                'descricao' => 'Molho de tomate, mussarela e manjericão',
                'preco' => 35.00,
                'categoria' => 'Salgada',
                'foto' => 'assets/img/Margherita.jpeg',
            ],
            [
                'nome' => 'Calabresa',
                'descricao' => 'Molho de tomate, mussarela e calabresa fatiada',
                'preco' => 40.00,
                'categoria' => 'Salgada',
                'foto' => 'assets/img/Calabresa.jpg',
            ],
            [
                'nome' => 'Chocolate',
                'descricao' => 'Chocolate, mussarela e morango',
                'preco' => 30.00,
                'categoria' => 'Doce',
                'foto' => 'assets/img/Chocolate.jpeg',
            ],
            [
                'nome' => 'Roberto',
                'descricao' => 'Pizza deliciosa... feita de professor...',
                'preco' => 420.69,
                'categoria' => 'Salgada',
                'foto' => 'assets/img/Roberto.png',
            ],
        ];

        DB::table('pizza')->insert($data);
    }
}
