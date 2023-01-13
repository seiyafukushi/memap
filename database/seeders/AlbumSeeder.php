<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
                'album_name' => 'Album Default',
                'album_memo' => '命名はデータを基準に考える',
                'user_id' => 1,
                'album_date' => '2022-11-01',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
