<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum UserStatus: int
{
    use EnumToArray;

    case Active = 1;
    case Banned = 0;
}
