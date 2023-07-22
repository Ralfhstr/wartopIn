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
                'pname' => 'Ayam Geprek',
                'pdesc' => 'Nasi Ayam Geprek Endul',
                'pprice' => 10000,
                // 'pqty'=> '20',
                'pphoto'=> 'prek.jpg',
                'type_id' => 1
            ],
            [
                'pname' => 'Pop Ice',
                'pdesc' => 'Pop Ice Segar',
                'pprice' => 4000,
                // 'pqty'=> '20',
                'pphoto'=> 'pop.jpg',
                'type_id' => 2
            ],
            [
                'pname' => 'Basreng',
                'pdesc' => 'Kripik Basreng Renyah',
                'pprice' => 8000,
                // 'pqty'=> '20',
                'pphoto'=> 'prek.jpg',
                'type_id' => 3
            ],
        ]);

    }
}
