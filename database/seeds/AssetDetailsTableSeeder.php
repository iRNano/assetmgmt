<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssetDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_details')->insert([
            ['os' => 'Windows 10',
            'asset_id' => 1,
            'specs' => 'i5 2.4Ghz 16GB DDR4 1TB HDD',
            'serial_number' => 'SN1234567891',
            'purchase_date' => Carbon::now(),
            'warranty_date' => Carbon::now()],
            ['os' => 'Windows 10',
            'asset_id' => 1,
            'specs' => 'i5 2.4Ghz 16GB DDR4 1TB HDD',
            'serial_number' => 'SN1234567892',
            'purchase_date' => Carbon::now(),
            'warranty_date' => Carbon::now()],
            ['os' => 'High Sierra',
            'asset_id' => 2,
            'specs' => 'i5 2.4Ghz 4GB DDR3 500GB HDD',
            'serial_number' => 'SN1234567893',
            'purchase_date' => Carbon::now(),
            'warranty_date' => Carbon::now()],
            ['os' => 'High Sierra',
            'asset_id' => 2,
            'specs' => 'i5 2.4Ghz 4GB DDR3 500GB HDD',
            'serial_number' => 'SN1234567894',
            'purchase_date' => Carbon::now(),
            'warranty_date' => Carbon::now()],
            ]
        );
    }
}
