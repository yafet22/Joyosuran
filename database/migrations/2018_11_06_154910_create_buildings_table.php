<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('buildingid');
            $table->integer('regionid')->unsigned()->foreign('regionid')
            ->references('regionid')->on('regionals')->onUpdate('cascade')->onDelete('cascade');
            $table->string('namapemilik')->nullable();
            $table->string('fungsibangunan')->nullable();
            $table->string('statusbangunan')->nullable();
            $table->string('statustanah')->nullable();
            $table->string('luastanah')->nullable();
            $table->integer('jumlahlantai')->default(1);
            $table->float('tinggibangunan')->default(0);
            $table->string('koefisiendasarbangunan')->nullable();
            $table->string('imb')->nullable();
            $table->float('gsj')->nullable();
            $table->float('gsb')->nullable();
            $table->float('gss')->nullable();
            $table->float('kdb')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('buildings');
    }
}
