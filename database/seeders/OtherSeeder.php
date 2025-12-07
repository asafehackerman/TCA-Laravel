<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Other;

class OtherSeeder extends Seeder
{
    public function run(): void
    {
        Other::create([
            'nome' => 'Coca-Cola',
            'descricao' => 'Refrigerante com sabor único e refrescante, vendido em mais de 200 países e considerado uma das maiores marcas do mundo.',
            'preco' => 7.00,
            'foto' => 'assets/img/CocaCola.png',
        ]);

        Other::create([
            'nome' => 'Fabiane',
            'descricao' => 'Aquela Fabiane perfeita para sua rotina se tornar muito mais leve e saborosa.',
            'preco' => 5.00,
            'foto' => 'assets/img/Fabiane.jpg',
        ]);
        
        Other::create([
            'nome' => 'Sequestro',
            'descricao' => 'Informar nome para (41) 9 9666-6603.',
            'preco' => 200.00,
            'foto' => 'assets/img/DrLivesey.gif',
        ]);
    }
}
