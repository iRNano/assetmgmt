<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'Information Technology'],
            ['name' => 'Finance'],
            ['name' => 'Human Resource'],
            ['name' => 'Marketing'],
            ['name' => 'Research & Development']]);
    }
}