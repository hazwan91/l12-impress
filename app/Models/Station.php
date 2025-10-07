<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    /** @use HasFactory<\Database\Factories\StationFactory> */
    use HasFactory;

    protected $fillable = [
        'department_id',
        'code',
        'name',
        'address',
    ];

    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'address' => 'string',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
