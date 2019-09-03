<?php

namespace app\shop\forms;

use app\shop\forms\meta\PurchaseSearchMeta;

class PurchaseSearch extends PurchaseSearchMeta
{
    public function fields()
    {
        return [
            'user' => [
                'name',
            ],
            'product' => [
                'title',
            ],
            'createTime'
        ];
    }

    /**
     * @param \yii\db\ActiveQuery $query
     */
    public function prepare($query)
    {
        $this->page = 1;
        $this->pageSize = 10;
        $query
            ->orderBy(['createTime' => SORT_DESC]);
    }
}
