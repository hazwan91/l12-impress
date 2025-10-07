<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentType extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function stations()
    {
        return $this->through('departments')->has('stations');
    }
}
