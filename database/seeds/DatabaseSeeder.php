<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
        	[DepartmentsTableSeeder::class,
            UsersTableSeeder::class,
        	AssetStatusesTableSeeder::class,
            CategoriesTableSeeder::class,
            AssetsTableSeeder::class,
            TransactionStatusesTableSeeder::class
            ]
        );
    }
}
