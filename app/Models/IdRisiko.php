<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdRisiko extends Model
{
    use SoftDeletes;

    public function kode_risiko(): BelongsTo
    {
        return $this->belongsTo(KodeRisiko::class);
    }

    protected $fillable = [
        'kode_risiko_id',
        'id_risiko',
        'kategori_risiko',
        'area_dampak',
        'sasaran_strategi',
        'indikator_kinerja',
        'proses_tahapan',
        'kriteria_kemungkinan',
    ];
}
