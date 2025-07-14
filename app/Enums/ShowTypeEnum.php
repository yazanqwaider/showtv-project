<?php

namespace App\Enums;

enum ShowTypeEnum: string {
    case Series = 'series';
    case TV_Show = 'tv';

    public static function getValues()
    {
        return collect(self::cases())->pluck('value')->all();
    }
}

?>