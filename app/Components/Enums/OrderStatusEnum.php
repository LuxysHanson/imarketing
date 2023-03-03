<?php

namespace App\Components\Enums;

use BenSampo\Enum\Enum;

class OrderStatusEnum extends Enum
{

    const STATUS_NEW = 0;
    const STATUS_SENT = 1;
    const STATUS_NO_SENT = 2;

}
