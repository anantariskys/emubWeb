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
        Schema::create('tautan', function (Blueprint $table) {
            $table->id('idTautan');
            $table->string('nama');
            $table->text('link');
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
        Schema::dropIfExists('tautan');
    }
};
