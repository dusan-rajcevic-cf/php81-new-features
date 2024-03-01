<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case VISITOR = 'visitor';

    public const Default = self::VISITOR;

    public function printValue(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::MANAGER => 'Manager',
            self::VISITOR => 'Visitor',
        };
    }

    public static function random(): UserRole
    {
        return match (rand(0, 2)) {
            0 => self::ADMIN,
            1 => self::MANAGER,
            2 => self::VISITOR,
        };
    }
}
