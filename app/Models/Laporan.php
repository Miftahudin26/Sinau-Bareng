<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use SoftDeletes;

    // Menentukan kolom yang dapat diisi massal
    protected $fillable = [
        'tanggal',
        'total_produksi',
        'total_bahan_baku',
    ];


    protected $table = 'laporans';


    /**
     * Get the produk that owns the laporan.
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }
}
