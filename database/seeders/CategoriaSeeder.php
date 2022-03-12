<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['name'=>'Redes'],
            ['name'=>'Seguridad'],
            ['name'=>'Hardware'],
            ['name'=>'Programación'],
            ['name'=>'BBDD'],
            ['name'=>'Sistemas operativos']
        ]);
    }
}
