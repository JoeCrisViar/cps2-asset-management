<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
        		[
        			'model' => 'ASRock A320M AMD A320 Micro ATX Motherboard',
        			'specification' => 'Supports AMD Socket AM4 A-Series APUs (Bristol Ridge) and Ryzen Series CPUs (Summit Ridge & Raven Ridge)',
        			'price' => 2850,
        			'stock' => 0,
                    'image_path' => 'mb1.jpg',
        			'category_id' => 6,
        			'user_id' => 2,
        			'brand_id' => 9,
        			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        		],

                [
                    'model' => 'ASRock FATALITY Z170 Gaming K4 Z170 LGA1151 ATX Motherboard',
                    'specification' => 'Supports 6th Generation Intel® Core™ Processors (Socket 1151), Supports DDR4 3866+(OC) memory modules',
                    'price' => 6950,
                    'stock' => 0,
                    'image_path' => 'mb2.jpg',
                    'category_id' => 6,
                    'user_id' => 2,
                    'brand_id' => 9,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'ASRock ModernS3 Z177 Gaming K4 Z170 LGA1151 ATX Motherboard',
                    'specification' => 'Supports 6th Generation Intel® Core™ Processors (Socket 1151), Supports DDR4 3866+(OC) memory modules',
                    'price' => 5000,
                    'stock' => 0,
                    'image_path' => 'mb3.jpg',
                    'category_id' => 6,
                    'user_id' => 3,
                    'brand_id' => 9,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'ASRock ModernS3 Z178 Gaming K5 Z170 LGA1151 ATX Motherboard',
                    'specification' => 'Supports 6th Generation Intel® Core™ Processors (Socket 1151), Supports DDR4 3866+(OC) memory modules',
                    'price' => 7000,
                    'stock' => 0,
                    'image_path' => 'mb4.jpg',
                    'category_id' => 6,
                    'user_id' => 3,
                    'brand_id' => 9,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'AeroCool Strike-X ONE',
                    'specification' => 'Advance Mid Tower Case (Black)',
                    'price' => 2600,
                    'stock' => 0,
                    'image_path' => 'case1.jpg',
                    'category_id' => 1,
                    'user_id' => 2,
                    'brand_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'AeroCool Quartz RGB ',
                    'specification' => 'Mid Tower Case (Black)',
                    'price' => 3800,
                    'stock' => 0,
                    'image_path' => 'case2.jpg',
                    'category_id' => 1,
                    'user_id' => 2,
                    'brand_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'NZXT H700i CAM',
                    'specification' => 'powered Premium Mid-Tower Case (MATTE BLACK + RED)',
                    'price' => 11650,
                    'stock' => 0,
                    'image_path' => 'case3.jpg',
                    'category_id' => 1,
                    'user_id' => 2,
                    'brand_id' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'SILVERSTONE RAVEN 03',
                    'specification' => 'BLACK W/ SIDEWINDOW CASE',
                    'price' => 6750,
                    'stock' => 0,
                    'image_path' => 'case4.jpg',
                    'category_id' => 1,
                    'user_id' => 2,
                    'brand_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],   
                [
                    'model' => 'Kingston UV500',
                    'specification' => '120GB SUV500/120G 2.5-inch SSD',
                    'price' => 1500,
                    'stock' => 0,
                    'image_path' => 'memory1.jpg',
                    'category_id' => 4,
                    'user_id' => 2,
                    'brand_id' => 27,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                
                [
                    'model' => 'Samsung IronWolf',
                    'specification' => '10TB SATA Hard Drive, 1- to 8-bay network attached storage (NAS), Desktop RAID and servers',
                    'price' => 17950,
                    'stock' => 0,
                    'image_path' => 'memory2.jpg',
                    'category_id' => 4,
                    'user_id' => 2,
                    'brand_id' => 33,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                 [
                    'model' => 'G.Skill Trident Z RGB',
                    'specification' => '16GB (8GBx2) 3200MHz DDR4 Dual Channel RGB Memory Kit (F4-3200C16D-16GTZR)',
                    'price' => 8450,
                    'stock' => 0,
                    'image_path' => 'ram1.jpg',
                    'category_id' => 5,
                    'user_id' => 2,
                    'brand_id' => 22,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'G.Skill Ripjaws V',
                    'specification' => '4GB (1X4GB) DDR4-2400MHZ F4-2400C15S-4GVR Memory Module',
                    'price' => 1700,
                    'stock' => 0,
                    'image_path' => 'ram3.jpg',
                    'category_id' => 5,
                    'user_id' => 2,
                    'brand_id' => 22,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'Crucial Ballistix Sport LT',
                    'specification' => '16GBx1 BLS16G4D240FSB DDR4-2400 UDIMM Desktop Memory Module (Gray)',
                    'price' => 8450,
                    'stock' => 0,
                    'image_path' => 'ram2.jpg',
                    'category_id' => 5,
                    'user_id' => 2,
                    'brand_id' => 17,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                 [
                    'model' => 'ASUS Dual GeForce® RTX 2080 Ti OC edition',
                    'specification' => '11GB GDDR6 | DUAL-RTX2080TI-O11G',
                    'price' => 84350,
                    'stock' => 0,
                    'image_path' => 'gc1.jpg',
                    'category_id' => 3,
                    'user_id' => 2,
                    'brand_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'Asus ROG Strix GeForce RTX 2070 OC edition',
                    'specification' => '8GB | ROG-STRIX-RTX2070-O8G-GAMING',
                    'price' => 43350,
                    'stock' => 0,
                    'image_path' => 'gc2.jpg',
                    'category_id' => 3,
                    'user_id' => 2,
                    'brand_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'Gigabyte GeForce RTX 2080',
                    'specification' => 'GAMING OC 8GB GDDR6 256-bit Graphics Card (GV-N2080GAMING OC-8GC)',
                    'price' => 53800,
                    'stock' => 0,
                    'image_path' => 'gc4.jpg',
                    'category_id' => 3,
                    'user_id' => 2,
                    'brand_id' => 24,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                 [
                    'model' => 'ASUS RX VEGA 64 STRIX',
                    'specification' => '8G GAMING HBM2 2048BIT, 1590 MHz Boost Clock (OC Mode) featuring 8GB HBM2 memory with AMD’s Vega architecture',
                    'price' => 51900,
                    'stock' => 0,
                    'image_path' => 'gc3.jpg',
                    'category_id' => 3,
                    'user_id' => 2,
                    'brand_id' => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'Intel Core i7',
                    'specification' => '6700K Unlocked Processor (8M Cache, up to 4.20 GHz)',
                    'price' => 15300,
                    'stock' => 0,
                    'image_path' => 'cpu1.jpg',
                    'category_id' => 10,
                    'user_id' => 2,
                    'brand_id' => 31,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'Ryzen 5 2600 ',
                    'specification' => '2nd Gen, Desktop Processor for Gamers, 6 core CPU, based on advanced StoreMI and new SenseMI technology.)',
                    'price' => 10450,
                    'stock' => 0,
                    'image_path' => 'cpu2.jpg',
                    'category_id' => 10,
                    'user_id' => 2,
                    'brand_id' => 32,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

                [
                    'model' => 'AMD A10-Series APU',
                    'specification' => '7th Gen A10-9700 Processor, leverages AMD’s advanced, future-ready AM4 platform that accommodates upgrades all the way to the incredibly powerful Ryzen™ 7 1800X processor.',
                    'price' => 3500,
                    'stock' => 0,
                    'image_path' => 'cpu3.jpg',
                    'category_id' => 10,
                    'user_id' => 2,
                    'brand_id' => 32,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
        ]);
    }
}
