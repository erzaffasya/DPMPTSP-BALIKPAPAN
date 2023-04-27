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
        Schema::create('akses_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId("berita_id")->constrained("berita")->onUpdate("cascade");
            $table->foreignId("tag_berita_id")->constrained("tag_berita")->onUpdate("cascade");
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
        Schema::dropIfExists('akses_tag');
    }
};
