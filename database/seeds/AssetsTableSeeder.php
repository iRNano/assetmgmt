<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert([
            ['category_id' => 1, 
            'brand' => 'HP',
            'model' => 'Envy Tower'
            ],
            ['category_id' => 2,
            'brand' => 'Macbook',
            'model' => 'Macbook Pro 2011']
        ]);
    }
}
