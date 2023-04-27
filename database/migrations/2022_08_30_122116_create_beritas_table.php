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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();            
            $table->string("judul")->nullable();
            // $table->text("deskripsi_singkat")->nullable();
            $table->text("isi")->nullable();
            $table->string("gambar")->nullable();
            $table->string("file")->nullable();
            $table->string("link")->nullable();
            $table->foreignId("users_id")->nullable()->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("kategori_berita_id")->nullable()->constrained("kategori_berita")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('berita');
    }
};
