<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // USER
            ["name" => "user.index"], // 1
            ["name" => "user.create"], // 2
            ["name" => "user.show"], // 3
            ["name" => "user.edit"], // 4
            ["name" => "user.delete"], // 5
            // PIZZA
            ["name" => "pizza.index"], // 6
            ["name" => "pizza.create"], // 7
            ["name" => "pizza.show"], // 8
            ["name" => "pizza.edit"], // 9
            ["name" => "pizza.delete"], // 10
            // OTHER
            ["name" => "other.index"], // 11
            ["name" => "other.create"], // 12
            ["name" => "other.show"], // 13
            ["name" => "other.edit"], // 14
            ["name" => "other.delete"], // 15
        ];
        DB::table('resources')->insert($data);
    }
}
