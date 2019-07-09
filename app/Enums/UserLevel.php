<?php

namespace App\Enums;

class UserLevel
{
    const ADMIN = "ADMIN";
    const SUPER_ADMIN = "SUPER_ADMIN";

    const LEVELS = [
        self::ADMIN => "Admin",
        self::SUPER_ADMIN => "Super Admin",
    ];
}