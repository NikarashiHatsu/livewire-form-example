<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KodeRisiko extends Model
{
    use SoftDeletes;

    public function id_risikos(): HasMany
    {
        return $this->hasMany(IdRisiko::class);
    }

    protected $fillable = [
        'nama_kasatker',
        'kode_risiko',
        'tanggal',
        'satker',
    ];
}
