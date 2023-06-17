<?php

namespace App\Core\Constants;

use App\Core\Utils\Enum;

class GroupType extends Enum
{
    const HEALTH = 'health';
    const ASSISTANCE = 'assistance';
    const EDUCATION = 'education';

    static $labels = [
        self::HEALTH => 'Saúde',
        self::ASSISTANCE => 'Assistência',
        self::EDUCATION => 'Educação',
    ];

    public static function getRandomValue()
    {
        $values = self::values();
        $randomIndex = array_rand($values);
        return $values[$randomIndex];
    }
}
