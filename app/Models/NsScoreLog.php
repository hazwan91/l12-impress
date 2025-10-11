<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsScoreLog extends Model
{
    /** @use HasFactory<\Database\Factories\NsScoreLogFactory> */
    use HasFactory;

    protected $fillable = [
        'nilai_sepunya_id',
        'subject',
        'type',
    ];

    protected $casts = [
        'nilai_sepunya_id' => 'integer',
        'subject' => 'string',
        'type' => 'string',
    ];

    public function nilaiSepunya()
    {
        return $this->belongsTo(NilaiSepunya::class);
    }
}
