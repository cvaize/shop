<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum ProductType: int
{
    use EnumToArray;

    case Default = 1;
    case Bundle = 2;
    case Event = 3;
    case Group = 4;
    case Select = 5;
    case Voucher = 6;
}
