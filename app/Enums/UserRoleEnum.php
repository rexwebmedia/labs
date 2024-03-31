<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case SUPERADMIN = 'SUPERADMIN';
    case ADMIN      = 'ADMIN';
    case DOCTOR     = 'DOCTOR';
    case PATIENT    = 'PATIENT';

    public static function toArray($onlyPublic = true): array
    {
        $arr = [];
        foreach (self::cases() as $case) {
            if($onlyPublic && in_array($case->value, ['ADMIN', 'DOCTOR']) ) {
                $arr[$case->value] = $case->name;
            }
        }
        return $arr;
    }
}
