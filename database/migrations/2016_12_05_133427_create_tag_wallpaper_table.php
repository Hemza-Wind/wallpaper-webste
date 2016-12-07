<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagWallpaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_wallpaper', function (Blueprint $table) {

            $table->integer('wallpaper_id', false, true)->unsigned()->length(10)->index();
            $table->foreign('wallpaper_id')->references('id')->on('Wallpaper')->onDelete('cascade');

            $table->integer('tag_id', false, true)->unsigned()->length(10)->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_wallpaper');
    }
}
