<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BahanBaku extends Model
{
        use SoftDeletes;
        // Menentukan kolom yang dapat diisi massal
        protected $fillable = [
            'nama',
            'stok',
            'supplier_id',

        ];


        protected $table = 'bahan_bakus';

        /**
         * Get the produksis that use this bahan baku.
         */
        public function produksis(): HasMany
        {
            return $this->hasMany(Produksi::class);
        }
        
        public function supplier(): BelongsTo
        {
        return $this->belongsTo(Supplier::class);
        }

        public function transaksi(): HasMany
        {
        return $this->hasMany(TransaksiBahanBaku::class);
        }
}
