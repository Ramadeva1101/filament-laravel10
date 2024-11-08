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
        Schema::create('pasiens', function (Blueprint $table) {
        $table->id('kode_pelanggan'); // ID AUTO_INCREMENT
        $table->string('nama', 100); // Nama pasien
        $table->date('tanggal_lahir'); // Tanggal lahir
        $table->enum('jenis_kelamin', ['pria', 'wanita']); // Jenis kelamin
        $table->string('alamat'); // Alamat
        $table->timestamps(); // Created at dan updated at


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
