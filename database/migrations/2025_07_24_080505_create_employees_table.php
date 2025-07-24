<?php

use App\Models\Employee;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id', 5)->references('id')->on('users')->onDelete('cascade');
            $table->string('nomor_karyawan', 12);
            $table->string('nama_karyawan');
            $table->string('jabatan_karyawan')->nullable();
            $table->timestamps();
        });

        Employee::create([
            'user_id' => 1,
            'nomor_karyawan' => "1092848",
            'nama_karyawan' => "Jamal",
            'jabatan_karyawan' => "Administrasi",
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('user_id')->foreign('user_id')->references('id')->on('users');
        Schema::dropIfExists('employees');
    }
};
