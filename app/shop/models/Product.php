<?php

namespace app\shop\models;

use app\shop\models\meta\ProductMeta;

class Product extends ProductMeta
{
    /**
     * @var int
     */
    public $purchaseCount;
}
