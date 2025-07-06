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
         Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_postingan');
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->enum('kategori', ['Lomba', 'Seminar', 'Webinar']);
            $table->string('institusi');
            $table->text('keterangan')->nullable();
            $table->string('snap_token')->nullable();
            $table->timestamps();

            $table->foreign('id_postingan')->references('id')->on('postingan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};
