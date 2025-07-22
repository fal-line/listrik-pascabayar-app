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
        Schema::create('usages', function (Blueprint $table) {
            $table->id('id_penggunaan');
            $table->foreignId('ref_id_pelanggan', 5)->references('id_pelanggan')->on('clients')->onDelete('cascade');
            $table->enum('bulan', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]);
            $table->year('tahun');
            $table->integer('meter_awal');
            $table->integer('meter_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('ref_id_pelanggan')->foreign('ref_id_pelanggan')->references('id_pelanggan')->on('clients');
        Schema::dropIfExists('usages');
    }
};
