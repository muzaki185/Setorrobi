<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('alamat');
            $table->string('no_rekening')->unique();
            $table->decimal('saldo', 15, 2)->default(0);
            $table->unsignedBigInteger('user_id')->nullable(); // relasi ke users, bisa dikosongkan
            $table->timestamps();

            // Foreign key ke tabel users, kalau kamu ingin ada relasi langsung
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nasabahs');
    }
};
