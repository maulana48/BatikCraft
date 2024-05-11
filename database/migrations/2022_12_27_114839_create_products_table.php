<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_category_id')->unsigned();
            $table->string('name');
            $table->string('merch');
            $table->decimal('price', 9, 2);
            $table->text('description');
            $table->string('color_type');
            $table->integer('stock');
            $table->string('city_origin');
            $table->string('batik_motif');
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
        Schema::dropIfExists('products');
    }
};
