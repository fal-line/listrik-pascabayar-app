<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->string('email');
            $table->string('password');
            $table->string('nomor_kwh');
            $table->string('nama_pelanggan');
            $table->foreignId('ref_id_electricityRate', 5)->references('id_tarif')->on('electricity_rates')->onDelete('cascade');
            $table->timestamps();
        });

        Client::create([
            'email' => 'client@test',
            'password' => Hash::make('1234'),
            'nomor_kwh' => "199486843",
            'nama_pelanggan' => "Irwan Suhandi",
            'ref_id_electricityRate' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('ref_id_electricityRate')->foreign('ref_id_electricityRate')->references('id_tarif')->on('electricity_rates');
        Schema::dropIfExists('clients');
    }
};
