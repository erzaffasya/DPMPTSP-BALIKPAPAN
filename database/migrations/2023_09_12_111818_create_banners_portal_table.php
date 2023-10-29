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
        Schema::create('banner_portal', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('link')->nullable();
            $table->text('youtube')->nullable();
            $table->boolean('isActive')->nullable();
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
        Schema::dropIfExists('banner');
    }
};
