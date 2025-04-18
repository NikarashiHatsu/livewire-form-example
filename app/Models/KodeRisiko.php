<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KodeRisiko extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_kasatker',
        'kode_risiko',
        'tanggal',
        'satker',
    ];
}
