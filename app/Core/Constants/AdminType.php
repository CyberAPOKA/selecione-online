<?php

namespace App\Core\Constants;

use App\Core\Utils\Enum;

class AdminType extends Enum
{
    const HEALTH = 'health';
    const ASSISTANCE = 'assistance';
    const EDUCATION = 'education';


    static $labels = [
        self::HEALTH => 'Saúde',
        self::ASSISTANCE => 'Assistência',
        self::EDUCATION => 'Educação',
    ];
}
