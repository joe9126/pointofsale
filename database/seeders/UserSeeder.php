<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>'Prime',
        	'email'=>'admin@gmail.com',
        	'password'=>Hash::make('password'),
            'phone'=>'0720456876',
        	'status'=>1,
        	'role'=>'Admin',
        	'created_at'=>Carbon::now(),
        	'updated_at'=>Carbon::now()
        	]);
    }
}
