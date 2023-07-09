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
        Schema::create('perizinan_detail', function (Blueprint $table) {
            $table->id();
            $table->string('dasar_hukum')->nullable();
            $table->string('persyaratan')->nullable();
            $table->string('masa_berlaku')->nullable();
            $table->string('waktu_proses')->nullable();
            $table->string('proses_penerbitan')->nullable();
            $table->string('biaya_retribusi')->nullable();        
            $table->integer('urut')->nullable();
            $table->foreignId("perizinan_id")->nullable()->constrained("perizinan")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('perizinan_detail');
    }
};
