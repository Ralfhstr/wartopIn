<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
<<<<<<< HEAD
            // [
            //     'name' => 'admin',
            //     'uphone' => '08xx',
            //     'email' => 'admin@admin',
            //     'password' => bcrypt('adminadmin'),
            //     'level' => 'admin'
            // ],
=======
            [
                'name' => 'admin',
                'uphone' => '08xx',
                'email' => 'admin@admin',
                'password' => bcrypt('adminadmin'),
                'level' => 'admin'
            ],
>>>>>>> aa8db68c0efc88a675d8113e3d1585b37badc744
            [
                'name' => 'user',
                'uphone' => '09xx',
                'email' => 'user@user',
                'password' => bcrypt('useruser'),
                'level' => 'user'
            ],
        ]);
    }
}
