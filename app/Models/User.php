<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Role;
use App\Enums\UserType;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'department_id',
        'station_id',
        'appoint_status_id',
        'role',
        'type',
        'other_type',
        'ic',
        'passport',
        'password',
        'name',
        'email',
        'no_hp',
        'tarikh_lantikan',
        'tarikh_lapor_diri',
        'tarikh_tamat_lantikan',
        'tempoh_lantikan',
        'tindakan',
        'catatan',
        'department_code',
        'department_desc',
        'station_code',
        'station_desc',
        'report_department_code',
        'report_department_desc',
        'report_station_code',
        'report_station_desc',
        'jawatan',
        'schema',
        'gred',
        'acting_post',
        'user_image',
        'is_blacklist',
        'blacklist_remark',
        'active',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'department_id' => 'integer',
            'station_id' => 'integer',
            'appoint_status_id' => 'integer',
            'role' => Role::class,
            'type' => UserType::class,
            'other_type' => 'string',
            'ic' => 'string',
            'passport' => 'string',
            'password' => 'hashed',
            'name' => 'string',
            'email' => 'string',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'password_last_generated_at' => 'datetime',
            'no_hp' => 'string',
            'tarikh_lantikan' => 'date',
            'tarikh_lapor_diri' => 'date',
            'tarikh_tamat_lantikan' => 'date',
            'tempoh_lantikan' => 'string',
            'tindakan' => 'string',
            'catatan' => 'string',
            'department_code' => 'string',
            'department_desc' => 'string',
            'station_code' => 'string',
            'station_desc' => 'string',
            'report_department_code' => 'string',
            'report_department_desc' => 'string',
            'report_station_code' => 'string',
            'report_station_desc' => 'string',
            'jawatan' => 'string',
            'schema' => 'string',
            'gred' => 'string',
            'acting_post' => 'string',
            'user_image' => 'array',
            'blacklist_remark' => 'string',
            'is_blacklist' => 'boolean',
            'active' => 'boolean',
            'created_by' => 'integer',
            'updated_by' => 'integer',
        ];
    }

    protected static function booted()
    {
        // static::creating(function (Model $model) {
        //     if ($model->created_by === null) {
        //         $model->created_by = Auth::user()->id;
        //         $model->save();
        //     }
        // });
        // static::updating(function (Model $model) {
        //     if ($model->updated_by === null) {
        //         $model->updated_by = Auth::user()->id;
        //         $model->save();
        //     }
        // });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->active && !$this->is_blacklist;
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
