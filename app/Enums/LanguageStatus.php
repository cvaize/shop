<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum LanguageStatus: int
{
    use EnumToArray;

    case Active = 1;
    case Disabled = 0;
}
