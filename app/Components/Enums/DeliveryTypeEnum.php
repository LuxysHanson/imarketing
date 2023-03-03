<?php

namespace App\Components\Enums;

use BenSampo\Enum\Enum;

final class DeliveryTypeEnum extends Enum
{

    const DElIVERY_BY_MAIL = 0;
    const DElIVERY_BY_COURIER = 1;

    public static function getLabels(): array
    {
        return [
            self::DElIVERY_BY_MAIL => 'Доставка по почте',
            self::DElIVERY_BY_COURIER => 'Доставке курьером'
        ];
    }

}
