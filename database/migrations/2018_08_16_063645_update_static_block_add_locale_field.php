<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStaticBlockAddLocaleField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('static_blocks', function (Blueprint $table) {
            // Unique key in field "key" must be dropped since it's no longer unique
            $table->dropUnique('static_blocks_key_unique');

            $table->string('locale')->after('content')->default(config('app.locale'))->index();

            $table->index([ 'locale', 'key' ]);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('static_blocks', function (Blueprint $table) {
            $table->dropIndex([ 'locale', 'key' ]);
            $table->dropColumn('locale');

            $table->unique('key');
        });

    }
}
