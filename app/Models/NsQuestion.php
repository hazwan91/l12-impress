<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsQuestion extends Model
{
    /** @use HasFactory<\Database\Factories\NsQuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'nilai_sepunya_id',
        'ns_bank_question_id',
        'ordering',
        'active',
    ];

    protected $casts = [
        'nilai_sepunya_id' => 'integer',
        'ns_bank_question_id' => 'integer',
        'ordering' => 'integer',
        'active' => 'boolean',
    ];
}
