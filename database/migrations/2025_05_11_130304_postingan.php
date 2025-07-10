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
        Schema::create('postingan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paket');
            $table->unsignedBigInteger('user_id');

            $table->string('JudulKegiatan');
            $table->text('Deskripsi');
            $table->string('JenisKegiatan');
            $table->string('Kategori');
            $table->date('TanggalKegiatan'); // Tambahan
            $table->string('Peserta'); // Tambahan (Umum/Mahasiswa)
            $table->string('Lokasi');
            $table->string('Penyelenggara');
            $table->string('TautanPendaftaran');
            $table->string('LinkGrup'); // Tambahan (WhatsApp/Telegram)
            $table->integer('Harga');// Tambahan

            $table->string('KontakInstagram');
            $table->string('KontakWebsite');
            $table->string('KontakYoutube');

            $table->string('Poster');
            $table->string('Snap_token')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('rejection_note')->nullable(); // alasan penolakan (baru)
            $table->timestamps();

            $table->foreign('id_paket')->references('id_paket')->on('paket')->onDelete('cascade');
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postingan');
    }
};

