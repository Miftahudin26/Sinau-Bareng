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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id(); // Kolom id
            $table->date('tanggal'); // Kolom tanggal
            $table->integer('total_produksi'); // Kolom total_produksi
            $table->integer('total_bahan_baku'); // Kolom total_bahan_baku
            $table->decimal('efisiensi', 10, 2); // Kolom efisiensi
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
