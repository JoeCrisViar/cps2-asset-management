<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
    public function run()
    {
        DB::table('roles')->insert([
        		[

        			'name' => 'Admin',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Seller',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Buyer',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		]
        ]);
    }
}
