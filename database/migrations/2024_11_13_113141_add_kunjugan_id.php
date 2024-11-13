<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tambah index untuk kode_obat di tabel obats
        Schema::table('obats', function (Blueprint $table) {
            $table->index('kode_obat');
        });

        // Tambah index untuk kode_pemeriksaan di tabel pemeriksaans
        Schema::table('pemeriksaans', function (Blueprint $table) {
            $table->index('kode_pemeriksaan');
        });

        // Setelah index dibuat, baru tambahkan foreign key
        Schema::table('detail_obat_kunjungans', function (Blueprint $table) {
            $table->unsignedBigInteger('kunjungan_id');
            $table->string('obat_id');

            $table->foreign('kunjungan_id')
                ->references('id')
                ->on('kunjungans')
                ->onDelete('cascade');

            $table->foreign('obat_id')
                ->references('kode_obat')
                ->on('obats')
                ->onDelete('cascade');
        });

        Schema::table('detail_pemeriksaan_kunjungans', function (Blueprint $table) {
            $table->unsignedBigInteger('kunjungan_id');
            $table->string('pemeriksaan_id');

            $table->foreign('kunjungan_id')
                ->references('id')
                ->on('kunjungans')
                ->onDelete('cascade');

            $table->foreign('pemeriksaan_id')
                ->references('kode_pemeriksaan')
                ->on('pemeriksaans')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('detail_obat_kunjungans', function (Blueprint $table) {
            $table->dropForeign(['kunjungan_id']);
            $table->dropForeign(['obat_id']);
            $table->dropColumn(['kunjungan_id', 'obat_id']);
        });

        Schema::table('detail_pemeriksaan_kunjungans', function (Blueprint $table) {
            $table->dropForeign(['kunjungan_id']);
            $table->dropForeign(['pemeriksaan_id']);
            $table->dropColumn(['kunjungan_id', 'pemeriksaan_id']);
        });

        // Drop index
        Schema::table('obats', function (Blueprint $table) {
            $table->dropIndex(['kode_obat']);
        });

        Schema::table('pemeriksaans', function (Blueprint $table) {
            $table->dropIndex(['kode_pemeriksaan']);
        });
    }
};
