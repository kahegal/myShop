<?php

namespace app\shop\models;

use app\shop\models\meta\PurchaseMeta;

class Purchase extends PurchaseMeta
{
    /**
     * @return double
     */
    public static function GetAverageCheck()
    {
        return Purchase::find()
            ->joinWith('product product')
            ->average('product.price') ?: 0;
    }
}
