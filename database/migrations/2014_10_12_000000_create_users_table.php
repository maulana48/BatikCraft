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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name')->default('user');
            $table->string('nama');
            $table->char('gender', 1);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->date('tanggal_lahir');
            $table->timestamp('email_dikonfirmasi')->nullable();
            $table->integer('role')->default(2);
            $table->text('media');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
