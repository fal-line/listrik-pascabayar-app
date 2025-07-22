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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_bayar');
            $table->foreignId('ref_id_tagihan', 5)->references('id_tagihan')->on('invoices')->onDelete('cascade');
            $table->enum('bulan_bayar', ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]);
            $table->integer('biaya_admin');
            $table->integer('total_bayara');
            $table->foreignId('ref_admin', 5)->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('ref_id_tagihan')->foreign('ref_id_tagihan', 5)->references('id_tagihan')->on('invoices');
        Schema::dropForeign('ref_admin')->foreign('ref_admin', 5)->references('id_user')->on('users');
        
        Schema::dropIfExists('payments');
    }
};
