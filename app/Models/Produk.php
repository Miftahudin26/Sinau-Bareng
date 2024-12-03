<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{

    use SoftDeletes;
    // Menentukan kolom yang dapat diisi massal
    protected $fillable = [
        'nama',
        'stok',
        'harga',
        'supplier_id'
    ];

    protected $table = 'produks';


    /**
     * Get the produksis for the produk.
     */
    public function produksis(): HasMany
    {
        return $this->hasMany(Produksi::class);
    }

    // Relasi ke tabel suppliers
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
