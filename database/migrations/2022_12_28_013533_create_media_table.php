<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\{ DB };

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('entitas_id');
            $table->string('nama_entitas');
            $table->string('file');
            $table->string('ekstensi');
            $table->timestamps();

            // $table->dropPrimary(); 
            // $keys = array('entitas_id', 'nama_entitas');
            // $table->primary($keys);
            //  $table->unique(['entitas_id', 'nama_entitas']);
        });
        // DB::unprepared('ALTER TABLE media DROP PRIMARY KEY, ADD PRIMARY KEY (  entitas_id ,  nama_entitas )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
};
