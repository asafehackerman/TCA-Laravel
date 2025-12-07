<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            // =========================
            // ADMIN (role_id = 1)
            // =========================

            // USER
            ["role_id" => 1, "resource_id" => 1, "permission" => 1], // user.index
            ["role_id" => 1, "resource_id" => 2, "permission" => 1], // user.create
            ["role_id" => 1, "resource_id" => 3, "permission" => 1], // user.show
            ["role_id" => 1, "resource_id" => 4, "permission" => 1], // user.edit
            ["role_id" => 1, "resource_id" => 5, "permission" => 1], // user.delete

            // PIZZA
            ["role_id" => 1, "resource_id" => 6, "permission" => 1], // pizza.index
            ["role_id" => 1, "resource_id" => 7, "permission" => 1], // pizza.create
            ["role_id" => 1, "resource_id" => 8, "permission" => 1], // pizza.show
            ["role_id" => 1, "resource_id" => 9, "permission" => 1], // pizza.edit
            ["role_id" => 1, "resource_id" => 10, "permission" => 1], // pizza.delete

            // OTHER
            ["role_id" => 1, "resource_id" => 11, "permission" => 1], // other.index
            ["role_id" => 1, "resource_id" => 12, "permission" => 1], // other.create
            ["role_id" => 1, "resource_id" => 13, "permission" => 1], // other.show
            ["role_id" => 1, "resource_id" => 14, "permission" => 1], // other.edit
            ["role_id" => 1, "resource_id" => 15, "permission" => 1], // other.delete


            // =========================
            // CLIENTE (role_id = 2)
            // =========================

            // USER (nenhum acesso administrativo)
            ["role_id" => 2, "resource_id" => 1, "permission" => 0],
            ["role_id" => 2, "resource_id" => 2, "permission" => 0],
            ["role_id" => 2, "resource_id" => 3, "permission" => 0],
            ["role_id" => 2, "resource_id" => 4, "permission" => 0],
            ["role_id" => 2, "resource_id" => 5, "permission" => 0],

            // PIZZA (cliente só vê)
            ["role_id" => 2, "resource_id" => 6, "permission" => 1], // index
            ["role_id" => 2, "resource_id" => 7, "permission" => 0], // create
            ["role_id" => 2, "resource_id" => 8, "permission" => 1], // show
            ["role_id" => 2, "resource_id" => 9, "permission" => 0], // edit
            ["role_id" => 2, "resource_id" => 10, "permission" => 0], // delete

            // OTHER (cliente só vê)
            ["role_id" => 2, "resource_id" => 11, "permission" => 1], // index
            ["role_id" => 2, "resource_id" => 12, "permission" => 0], // create
            ["role_id" => 2, "resource_id" => 13, "permission" => 1], // show
            ["role_id" => 2, "resource_id" => 14, "permission" => 0], // edit
            ["role_id" => 2, "resource_id" => 15, "permission" => 0], // delete
        ];

        DB::table('permissions')->insert($data);
    }
}
