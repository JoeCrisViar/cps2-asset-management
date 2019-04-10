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
        		[
        			'username' => 'Admin',
        			'email' => 'admin@gmail.com',
        			'password' => bcrypt('secret123'),
        			'role_id' => 1,
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'username' => 'Seller01',
        			'email' => 'seller01@gmail.com',
        			'password' => bcrypt('secret123'),
        			'role_id' => 2,
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'username' => 'Seller02',
        			'email' => 'seller02@gmail.com',
        			'password' => bcrypt('secret123'),
        			'role_id' => 2,
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'username' => 'Buyer01',
        			'email' => 'buyer01@gmail.com',
        			'password' => bcrypt('secret123'),
        			'role_id' => 3,
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'username' => 'Buyer02',
        			'email' => 'buyer02@gmail.com',
        			'password' => bcrypt('secret123'),
        			'role_id' => 3,
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		]
        ]);
    }
}
