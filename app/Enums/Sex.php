<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum Sex: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case LELAKI = 'LELAKI';
    case WANITA = 'WANITA';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::LELAKI => 'LELAKI',
            self::WANITA => 'WANITA',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::LELAKI => 'LELAKI',
            self::WANITA => 'WANITA',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::LELAKI => 'success',
            self::WANITA => 'pink',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::LELAKI => 'heroicon-m-user',
            self::WANITA => 'heroicon-m-user',
        };
    }
}
