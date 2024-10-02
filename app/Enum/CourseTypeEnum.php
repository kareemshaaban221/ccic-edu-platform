<?php

namespace App\Enum;

enum CourseTypeEnum: string {

    case ONLINE = 'online';
    case OFFLINE = 'offline';

    public static function getValues(): array {
        $values = [];
        foreach (self::cases() as $case) {
            $values[] = $case->value;
        }
        return $values;
    }

}
