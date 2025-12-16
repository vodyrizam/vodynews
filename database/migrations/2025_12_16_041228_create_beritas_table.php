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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penulis_id')->constrained('users');
            $table->foreignId('validator_id')->nullable()->constrained('users');

            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('isi');
            $table->string('kategori');
            $table->string('hashtag')->nullable(); // bonus
            $table->integer('viewed')->default(0);
            $table->date('tanggal_publikasi')->nullable();

            $table->tinyInteger('status')->default(1); 
            // 1 = menunggu validasi
            // 2 = publish

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
