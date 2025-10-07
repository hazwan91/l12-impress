<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsBankQuestion extends Model
{
    /** @use HasFactory<\Database\Factories\NsBankQuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'no_siri',
        'perkara',
        'reverse',
    ];

    protected $casts = [
        'no_siri' => 'string',
        'perkara' => 'string',
        'reverse' => 'boolean',
    ];
}
