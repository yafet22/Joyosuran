<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regionals',function(Blueprint $table){
            $table->foreign('kecamatan')->references('kecamatanid')->on('kecamatans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kelurahan')->references('kelurahanid')->on('kelurahans')->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
