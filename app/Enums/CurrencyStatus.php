<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum CurrencyStatus: int
{
    use EnumToArray;
    
    case Active = 1;
    case Disabled = 0;
}
