<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        		[

        			'name' => 'Casing',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'CPU Fan',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Graphics Card',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Internal Storage',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Memory Modules',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],


        		[
        			'name' => 'Mother Boards',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'NIC Card',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Optical Drive',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Power Supply',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Processor',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Accessories',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		]
        ]);
    }
}
