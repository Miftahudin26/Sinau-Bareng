<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    // Menentukan kolom yang dapat diisi massal
    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
    ];

    protected $table = 'suppliers';


    /**
     * Get the produks for the supplier.
     */
    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }

    public function bahanBakus(): HasMany
    {
        return $this->hasMany(BahanBaku::class);
    }

}

