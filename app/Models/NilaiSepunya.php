<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSepunya extends Model
{
    /** @use HasFactory<\Database\Factories\NilaiSepunyaFactory> */
    use HasFactory;

    protected $fillable = [
        'year',
        'jumlah_penilai_min',
        'jumlah_penilai_max',
        'tarikh_mula_1',
        'tarikh_akhir_1',
        'tarikh_mula_2',
        'tarikh_akhir_2',
        'tarikh_mula_3',
        'tarikh_akhir_3',
        'tarikh_mula_4',
        'tarikh_akhir_4',
        'tarikh_mula_5',
        'tarikh_akhir_5',
        'catatan',
    ];

    protected $casts = [
        'year' => 'string',
        'jumlah_penilai_min' => 'integer',
        'jumlah_penilai_max' => 'integer',
        'tarikh_mula_1' => 'date',
        'tarikh_akhir_1' => 'date',
        'tarikh_mula_2' => 'date',
        'tarikh_akhir_2' => 'date',
        'tarikh_mula_3' => 'date',
        'tarikh_akhir_3' => 'date',
        'tarikh_mula_4' => 'date',
        'tarikh_akhir_4' => 'date',
        'tarikh_mula_5' => 'date',
        'tarikh_akhir_5' => 'date',
        'catatan' => 'string',
    ];
}
