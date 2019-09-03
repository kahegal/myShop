<?php

namespace app\shop\enums\meta;

use Yii;
use steroids\base\Enum;

abstract class BalanceTypeEnumMeta extends Enum
{
    const CHARGE = 'charge';
    const BUY = 'buy';

    public static function getLabels()
    {
        return [
            self::CHARGE => Yii::t('app', 'Пополнение'),
            self::BUY => Yii::t('app', 'Покупка')
        ];
    }
}
