<?php

use App\Models\ElectricityRate;
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
        Schema::create('electricity_rates', function (Blueprint $table) {
            $table->id('id_tarif');
            $table->string('daya')->unique();
            $table->integer('tarif');
            $table->timestamps();
        });

        ElectricityRate::create([
            'daya' => 'A9/950KWH',
            'tarif' => 2550,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electricity_rates');
    }
};
