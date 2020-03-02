<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_statuses')->insert([
        	['name' => 'Available'],
      		['name' => 'Deployed']
        ]);
    }
}
