<?php

namespace app\shop\forms;

use app\shop\forms\meta\ProductsSearchMeta;

class ProductsSearch extends ProductsSearchMeta
{
    public function fields()
    {
        return [
            'id',
            'title',
            'price',
            'purchaseCount'
        ];
    }

    /**
     * @param \yii\db\ActiveQuery $query
     */
    public function prepare($query)
    {
        parent::prepare($query);
        $query
            ->alias('product')
            ->select(['COUNT(purchase.id) purchaseCount', 'product.*'])
            ->joinWith('purchases purchase')
            ->groupBy('product.id')
            ->addOrderBy(['createTime' => SORT_DESC]);
    }
}
