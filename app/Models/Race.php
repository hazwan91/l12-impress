<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    /** @use HasFactory<\Database\Factories\RaceFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    public function sagaRegistrationCommitees()
    {
        return $this->hasMany(Race::class);
    }

    public function sagaRegistrationTechnicals()
    {
        return $this->hasMany(Race::class);
    }

    public function sagaRegistrationContingents()
    {
        return $this->hasMany(Race::class);
    }
}
