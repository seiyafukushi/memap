<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

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
                'name' => 'User1',
                'email' => 'abc@gmail.com',
                'password' => Hash::make('abc'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
