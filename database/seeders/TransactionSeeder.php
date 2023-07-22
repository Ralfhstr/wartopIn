<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'user_id' => 1,
                'product_id' => 4,
                'tqty'=> '20',
                'payment_id'=> 1,
                'status_id' => 1
            ],
            // [
            //     'pname' => 'Pop Ice',
            //     'pprice' => 'Rp. 4.000',
            //     'pqty'=> '20',
            //     'pphoto'=> 'pop.jpg',
            //     'type_id' => 2
            // ],
            // [
            //     'pname' => 'Basreng',
            //     'pprice' => 'Rp. 8.000',
            //     'pqty'=> '20',
            //     'pphoto'=> 'prek.jpg',
            //     'type_id' => 3
            // ],
        ]);
    }
}
