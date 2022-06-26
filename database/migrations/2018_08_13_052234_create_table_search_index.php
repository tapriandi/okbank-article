<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSearchIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_index', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uri')->index();
            $table->string('title');
            $table->string('locale');
            $table->text('keyword');
            $table->timestamps();

            $table->unique([ 'uri', 'locale' ]);
        });

        DB::statement('ALTER TABLE search_index ADD FULLTEXT fulltext_index(title, keyword)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_index');
    }
}
