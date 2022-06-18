<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'profesor1', 'email'=>'profesor@example.com', 'password' => Hash::make(12345678), 'rol'=>1],
        ]);

        DB::table('users')->insert([
            ['name'=>'alumno1', 'email'=>'alumno@example.com', 'password' => Hash::make(12345678), 'rol'=>0],
        ]);
    }
}
