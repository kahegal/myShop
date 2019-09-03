<?php

namespace app\shop\forms\meta;

use steroids\base\SearchModel;
use \Yii;
use app\shop\models\Product;

abstract class ProductsSearchMeta extends SearchModel
{
    public $purchaseCount;
    public $price;

    public function rules()
    {
        return [
            ['purchaseCount', 'integer'],
            ['price', 'number'],
        ];
    }

    public function sortFields()
    {
        return [
            'purchaseCount',
            'price'
        ];
    }

    public function createQuery()
    {
        return Product::find();
    }

    public static function meta()
    {
        return [
            'purchaseCount' => [
                'label' => Yii::t('app', 'Количество покупок'),
                'appType' => 'integer',
                'isSortable' => true
            ],
            'price' => [
                'label' => Yii::t('app', 'Цена'),
                'appType' => 'double',
                'isSortable' => true
            ]
        ];
    }
}
