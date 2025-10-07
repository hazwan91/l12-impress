<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsScorer extends Model
{
    /** @use HasFactory<\Database\Factories\NsScorerFactory> */
    use HasFactory;

    protected $fillable = [
        'ns_score_id',
        'user_id',
        'selection_method',
    ];

    protected $casts = [
        'ns_score_id' => 'integer',
        'user_id' => 'integer',
        'selection_method' => 'string',
    ];

    public function penilai()
    {
        return $this->belongsTo(User::class);
    }
}
