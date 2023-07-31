<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
<<<<<<< HEAD
                'tyname' => 'makanan berat'
            ],
            [
                'tyname' => 'minuman'
            ],
            [
=======
                'id' => 1,
                'tyname' => 'makanan berat'
            ],
            [
                'id' => 2,
                'tyname' => 'minuman'
            ],
            [
                'id' => 3,
>>>>>>> aa8db68c0efc88a675d8113e3d1585b37badc744
                'tyname' => 'makanan ringan'
            ],
        ]);
    }
}
