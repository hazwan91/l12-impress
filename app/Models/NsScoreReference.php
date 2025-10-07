<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsScoreReference extends Model
{
    /** @use HasFactory<\Database\Factories\NsScoreReferenceFactory> */
    use HasFactory;

    protected $fillable = [
        'nilai_sepunya_id',
        'skor_penilaian_intervensi_dari',
        'skor_penilaian_intervensi_hingga',
        'keterangan_umum',
        'tindakan',
    ];

    protected $casts = [
        'nilai_sepunya_id' => 'integer',
        'skor_penilaian_intervensi_dari' => 'string',
        'skor_penilaian_intervensi_hingga' => 'string',
        'keterangan_umum' => 'string',
        'tindakan' => 'string',
    ];
}
