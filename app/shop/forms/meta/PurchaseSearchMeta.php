<?php

namespace app\shop\forms\meta;

use steroids\base\SearchModel;
use app\shop\models\Purchase;

abstract class PurchaseSearchMeta extends SearchModel
{


    public function sortFields()
    {
        return [

        ];
    }

    public function createQuery()
    {
        return Purchase::find();
    }

    public static function meta()
    {
        return [

        ];
    }
}
