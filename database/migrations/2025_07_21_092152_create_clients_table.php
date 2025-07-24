<?php

use App\Models\Client;
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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nomor_kwh');
            $table->string('nama_pelanggan');
            $table->foreignId('ref_id_electricityRate')->references('id_tarif')->on('electricity_rates')->onDelete('cascade');
            $table->timestamps();
        });

        Client::create([
            'user_id' => 2,
            'nomor_kwh' => "10049572",
            'nama_pelanggan' => "Widia",
            'ref_id_electricityRate' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('user_id')->foreign('user_id')->references('id')->on('users');
        Schema::dropForeign('ref_id_electricityRate')->foreign('ref_id_electricityRate')->references('id_tarif')->on('electricity_rates');
        Schema::dropIfExists('clients');
    }
};
