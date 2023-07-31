<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
<<<<<<< HEAD
                'pname' => 'Ayam Geprek',
                'pprice' => 'Rp. 10.000',
                'pqty'=> '20',
                'pphoto'=> 'prek.jpg',
                'type_id' => 1
            ],
            [
                'pname' => 'Pop Ice',
                'pprice' => 'Rp. 4.000',
                'pqty'=> '20',
                'pphoto'=> 'pop.jpg',
                'type_id' => 2
            ],
            [
                'pname' => 'Basreng',
                'pprice' => 'Rp. 8.000',
                'pqty'=> '20',
                'pphoto'=> 'prek.jpg',
                'type_id' => 3
            ],
        ]);

=======
                'id' => 1,
                'pname' => 'Ayam Geprek',
                'pprice' => 'Rp. 10.000',
                'pqty'=> '20',
                // 'pphoto'=> 'prek.jpg',
                'type_id' => 1
            ],
            [
                'id' => 2,
                'pname' => 'Pop Ice',
                'pprice' => 'Rp. 4.000',
                'pqty'=> '20',
                // 'pphoto'=> 'pop.jpg',
                'type_id' => 2
            ],
            [
                'id' => 3,
                'pname' => 'Basreng',
                'pprice' => 'Rp. 8.000',
                'pqty'=> '20',
                // 'pphoto'=> 'prek.jpg',
                'type_id' => 3
            ],
        ]);
>>>>>>> aa8db68c0efc88a675d8113e3d1585b37badc744
    }
}
