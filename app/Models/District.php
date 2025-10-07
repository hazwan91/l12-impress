<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /** @use HasFactory<\Database\Factories\DistrictFactory> */
    use HasFactory;

    protected $fillable = [
        'zone_id',
        'name',
    ];

    protected $casts = [
        'id' => 'integer',
        'zone_id' => 'integer',
        'name' => 'string',
    ];

    // public function scopeFilterByRoleForCurrentSaga(Builder $query, $saga_id)
    // {
    //     $role = Auth::user()->role;
    //     if (in_array($role, ['SUPER_ADMIN', 'ADMIN'])) {
    //         $query->whereHas('sagaDistricts', function ($query) use ($saga_id) {
    //             return $query->where('saga_id', $saga_id);
    //         });
    //     } else {
    //         $query->whereHas('sagaDistricts', function ($query) use ($saga_id) {
    //             return $query->where('saga_id', $saga_id);
    //         })->whereHas('users', function ($query) {
    //             return $query->where('users.id', '=', Auth::user()->id);
    //         });
    //     }
    // }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_districts')->withTimestamps();
    }
}
