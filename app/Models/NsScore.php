<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsScore extends Model
{
    /** @use HasFactory<\Database\Factories\NsScoreFactory> */
    use HasFactory;

    protected $fillable = [
        'ns_scorer_id',
        'ns_question_id',
        'skor',
    ];

    protected $casts = [
        'ns_scorer_id' => 'integer',
        'ns_question_id' => 'integer',
        'skor' => 'string',
    ];

    public function nsQuestion()
    {
        return $this->belongsTo(NsQuestion::class, 'ns_question_id');
    }
}
