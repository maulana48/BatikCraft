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
        Schema::create('pemesanan_keranjangs', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name')->default('pemesanan_keranjang');
            $table->bigInteger('keranjang_id');
            $table->bigInteger('pemesanan_id');
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
        Schema::dropIfExists('pemesanan_keranjangs');
    }
};
