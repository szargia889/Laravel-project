<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    /* Llamada al seeder de categorias */ 
    public function run()
    {
        $this->call([

            CategoriaSeeder::class
            
        ]);
    }
}
