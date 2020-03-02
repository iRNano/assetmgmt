<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Adrian',
            'username' => 'admin-A',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('password'),
            'isAdmin' => 1,
            'department_id' => 1,
            'created_at' => Carbon::now()],
            
            ['name' => 'Normal User',
            'username' => 'TestUser',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'isAdmin' => 0,
            'department_id' => 3,
            'created_at' => Carbon::now()]
        ]);
    }
}
