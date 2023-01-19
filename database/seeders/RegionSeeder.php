<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
                'region_name' => '東京ビッグサイト',
                'region_address' => '東京都江東区有明３丁目１１−１',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
