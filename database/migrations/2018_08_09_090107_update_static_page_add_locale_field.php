<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStaticPageAddLocaleField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('static_pages_meta', function (Blueprint $table) {
            $table->string('locale')->after('val')->index();

            $table->index([ 'locale', 'uri' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('static_pages_meta', function (Blueprint $table) {
            $table->dropIndex([ 'locale', 'uri' ]);
            $table->dropColumn('locale');
        });
    }
}
