<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointStatus extends Model
{
    /** @use HasFactory<\Database\Factories\AppointStatusFactory> */
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

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
