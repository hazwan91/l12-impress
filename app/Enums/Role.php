<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum Role: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case SUPER_ADMIN = 'SUPER_ADMIN';
    case ADMIN = 'ADMIN';
    case JPAN = 'JPAN';
    case VIP = 'VIP';
    case STAF = 'STAF';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => Str::upper('Super Admin'),
            self::ADMIN => Str::upper('Admin'),
            self::JPAN => Str::upper('JPAN'),
            self::VIP => Str::upper('VIP'),
            self::STAF => Str::upper('Staf KNS'),
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::ADMIN => 'Admin',
            self::JPAN => 'JPAN',
            self::VIP => 'VIP',
            self::STAF => 'Staf KNS',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::SUPER_ADMIN => 'primary',
            self::ADMIN => 'primary',
            self::JPAN => 'primary',
            self::VIP => 'primary',
            self::STAF => 'primary',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'heroicon-m-user',
            self::ADMIN => 'heroicon-m-user',
            self::JPAN => 'heroicon-m-user',
            self::VIP => 'heroicon-m-user',
            self::STAF => 'heroicon-m-user',
        };
    }
}
