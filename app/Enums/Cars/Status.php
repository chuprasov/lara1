<?php

namespace App\Enums\Cars;

enum Status: int
{
    case DRAFT = 0;
    case ACTIVE = 10;
    case SOLD = 20;
    case CANCELED = 30;

    public function title()
    {
        return match ($this) {
            self::DRAFT => 'Черновик',
            self::ACTIVE => 'Активно',
            self::SOLD => 'Продано',
            self::CANCELED => 'Отменено'
        };
    }
}
