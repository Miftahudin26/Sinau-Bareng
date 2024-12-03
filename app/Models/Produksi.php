<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\BahanBaku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produksi extends Model
{
    use SoftDeletes;
    // Menentukan kolom yang dapat diisi massal
    protected $fillable = [
        'produk_id',
        'bahan_baku_id',
        'jumlah',
        'tanggal',
        'status',
    ];


    protected $table = 'produksis';


    /**
     * Get the produk that owns the produksi.
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }

    /**
     * Get the bahan baku that is used in the produksi.
     */
    public function bahanBaku(): BelongsTo
    {
        return $this->belongsTo(BahanBaku::class);
    }

}
