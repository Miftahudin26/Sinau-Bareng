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
        Schema::create('produksis', function (Blueprint $table) {
            $table->id(); // Kolom 'id' sebagai primary key
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade'); // Menambahkan foreign key yang merujuk ke tabel 'produk'
            $table->foreignId('bahan_baku_id')->constrained('bahan_bakus')->onDelete('cascade');
            $table->integer('jumlah'); // Kolom untuk jumlah produk
            $table->date('tanggal'); // Kolom untuk tanggal
            $table->enum('status', ['Berjalan', 'Selesai']); // Kolom untuk status
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksis');
    }
};
