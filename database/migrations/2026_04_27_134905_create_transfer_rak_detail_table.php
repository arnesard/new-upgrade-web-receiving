<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transfer_rak_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_rak_id')->constrained('transfer_raks')->onDelete('cascade');
            $table->string('kode_rak', 100);
            $table->timestamp('waktu_scan');
            $table->timestamps();

            $table->index('transfer_rak_id');
            $table->index('kode_rak');
            $table->unique(['transfer_rak_id', 'kode_rak']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transfer_rak_details');
    }
};
