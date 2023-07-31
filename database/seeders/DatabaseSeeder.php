<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
<<<<<<< HEAD
            // PaymentSeeder::class,
            // ProductSeeder::class,
            StatusSeeder::class,
            // TransactionSeeder::class,
            // TypeSeeder::class,
            // UserSeeder::class,
=======
            TypeSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
>>>>>>> aa8db68c0efc88a675d8113e3d1585b37badc744
        ]);
    }
}
