<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentmodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentmodes')->insert([
        		[

        			'name' => 'Cash On Delivery',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Over-the-counter',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Credit / Debit Card',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

        		[
        			'name' => 'Remittance / Payment Center',
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		]
        ]);
    }
}
