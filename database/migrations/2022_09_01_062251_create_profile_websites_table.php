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
        Schema::create('profil_website', function (Blueprint $table) {
            $table->id();
            $table->string("logo")->nullable();
            $table->text("slogan")->nullable();
            $table->text("visi")->nullable();
            $table->text("misi")->nullable();
            $table->text("deskripsi")->nullable();
            $table->text("video")->nullable();

            $table->string("nama_kadis")->nullable();
            $table->string("foto_kadis")->nullable();

            $table->text("alamat")->nullable();
            $table->string("email")->nullable();
            $table->string("no_telp")->nullable();
            $table->text("google_maps")->nullable();


            $table->string("instagram")->nullable();
            $table->string("youtube")->nullable();
            $table->string("facebook")->nullable();
            
            $table->string('slogan_pelayanan')->nullable();
            $table->text('deskripsi_pelayanan')->nullable();
            $table->string('gambar_pelayanan')->nullable();
            $table->string('senin_kamis')->nullable();
            $table->string('jumat')->nullable();
            $table->boolean('isLibur')->default(0);

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
        Schema::dropIfExists('profil_website');
    }
};
