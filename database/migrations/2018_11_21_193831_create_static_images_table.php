<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale');
            $table->string('key');
            $table->string('path');
            $table->timestamps();

            $table->unique([ 'locale', 'key' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_images');
    }
}
