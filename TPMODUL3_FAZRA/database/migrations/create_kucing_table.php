<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kucings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kucing');
            $table->string('ras');
            $table->string('warna_bulu');
            $table->string('usia');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kucings');
    }
};
