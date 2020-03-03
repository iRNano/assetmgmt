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
            ProfilesTableSeeder::class,
        	AssetStatusesTableSeeder::class,
            CategoriesTableSeeder::class,
            AssetsTableSeeder::class,
            AssetDetailsTableSeeder::class,
            TransactionStatusesTableSeeder::class
            ]
        );
    }
}
