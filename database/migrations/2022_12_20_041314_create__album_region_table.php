<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_region', function (Blueprint $table) {
            $table->foreignId('album_id')->constrained('albums');   //参照先のテーブル名を
            $table->foreignId('region_id')->constrained('regions');    //constrainedに記載
            $table->primary(['album_id', 'region_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_region');
    }
};
