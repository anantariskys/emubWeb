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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id('idAlumni');
            $table->string('nama');
            $table->string('jurusan');
            $table->unsignedBigInteger('idFakultas');
            $table->foreign('idFakultas')->references('idFakultas')->on('fakultas');
            $table->integer('angkatan');
            $table->unsignedBigInteger('idKerja');
            $table->foreign('idKerja')->references('idKerja')->on('kerja');
            $table->string('linkedin');
            $table->string('email');
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
        Schema::dropIfExists('alumni');
    }
};
