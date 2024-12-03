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
            Schema::create('produks', function (Blueprint $table) {
                $table->id(); // Kolom 'id' sebagai primary key
                $table->string('nama'); // Kolom untuk nama produk
                $table->integer('stok'); // Kolom untuk stok produk
                $table->decimal('harga', 10, 2); // Kolom untuk harga produk
                $table->timestamps(); // Kolom created_at dan updated_at
                $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
