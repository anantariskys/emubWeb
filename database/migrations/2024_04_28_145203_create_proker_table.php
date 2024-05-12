<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proker', function (Blueprint $table) {
            $table->id('idProker');
            $table->string('nama');
            $table->string('kementrian');
            $table->text('deskripsi');
            $table->text('image');
            $table->unsignedBigInteger('idAdmin');
            $table->foreign('idAdmin')->references('idAdmin')->on('admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proker');
    }
};
