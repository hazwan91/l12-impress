<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsUser extends Model
{
    /** @use HasFactory<\Database\Factories\NsUserFactory> */
    use HasFactory;

    protected $fillable = [
        'nilai_sepunya_id',
        'user_id',
        'skor_keseluruhan',
        'skor_nilai_sepunya',
        'skor_penilaian_intervensi',
    ];

    protected $casts = [
        'nilai_sepunya_id' => 'integer',
        'user_id' => 'integer',
        'skor_keseluruhan' => 'string',
        'skor_nilai_sepunya' => 'string',
        'skor_penilaian_intervensi' => 'string',
    ];
}
