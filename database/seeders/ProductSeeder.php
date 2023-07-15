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
                'pprice' => 'Rp. 10.000',
                'pqty'=> '20',
                'type_id' => 1
            ],
            [
                'pname' => 'Pop Ice',
                'pprice' => 'Rp. 4.000',
                'pqty'=> '20',
                'type_id' => 2
            ],
            [
                'pname' => 'Basreng',
                'pprice' => 'Rp. 8.000',
                'pqty'=> '20',
                'type_id' => 3
            ],
        ]);

    }
}
