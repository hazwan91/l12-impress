<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'department_type_id',
        'code',
        'name',
        'reporting_code',
        'hod_title',
        'address',
    ];

    protected $casts = [
        'id' => 'integer',
        'department_type_id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'reporting_code' => 'string',
        'hod_title' => 'string',
        'address' => 'string',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    public function departmentType()
    {
        return $this->belongsTo(DepartmentType::class);
    }

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
