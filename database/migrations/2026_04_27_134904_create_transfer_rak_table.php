<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transfer_raks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_karyawan')->constrained('employees')->onDelete('restrict');
            $table->foreignId('id_supir')->constrained('drivers')->onDelete('restrict');
            $table->foreignId('id_mobil')->constrained('vehicles')->onDelete('restrict');
            $table->integer('total_rak')->default(0);
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->enum('status', ['proses', 'selesai', 'batal'])->default('proses');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('id_karyawan');
            $table->index('id_supir');
            $table->index('id_mobil');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transfer_raks');
    }
};
