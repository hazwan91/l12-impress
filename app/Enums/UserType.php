<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum UserType: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case SM2 = 'SM2';
    case NON_SM2 = 'NON_SM2';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SM2 => 'SM2',
            self::NON_SM2 => 'BUKAN SM2',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::SM2 => 'Kakitangan Kerajaan',
            self::NON_SM2 => 'Bukan Kakitangan Kerajaan',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::SM2 => 'success',
            self::NON_SM2 => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::SM2 => 'heroicon-m-user',
            self::NON_SM2 => 'heroicon-m-user',
        };
    }
}
