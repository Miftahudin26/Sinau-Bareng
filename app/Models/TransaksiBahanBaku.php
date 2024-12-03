<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiBahanBaku extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'bahan_baku_id',
        'jenis',
        'jumlah',
        'tanggal',
    ];

    public function bahanBaku(): BelongsTo
    {
        return $this->belongsTo(BahanBaku::class);
    }
}
