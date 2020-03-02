<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_statuses')->insert([
            ['name' => 'Pending'],
            ['name' => 'Completed'],
            ['name' => 'Rejected']
        ]);
    }
}
