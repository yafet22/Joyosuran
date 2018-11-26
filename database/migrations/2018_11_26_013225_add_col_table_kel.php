<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColTableKel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelurahans',function(Blueprint $table){
            $table->string('nokelurahan')->nullable()->unique()->after('kelurahanid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelurahans',function(Blueprint $table){
            $table->dropColumn('nokelurahan');
        });
    }
}
