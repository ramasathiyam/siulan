<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up(): void{Schema::create('penanda', function (Blueprint $table) {$table->id();$table->unsignedBigInteger('user_id');$table->unsignedBigInteger('postingan_id');$table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('postingan_id')->references('id')->on('postingan')->onDelete('cascade');

    $table->unique(['user_id', 'postingan_id']); // tidak boleh dobel penandaan
});
    }

    public function down(): void
    {
        Schema::dropIfExists('penanda');
    }
};