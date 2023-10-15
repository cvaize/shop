<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum CommonStatus: int
{
    use EnumToArray;

    case Enable = 1;
    case Disabled = 0;
}
