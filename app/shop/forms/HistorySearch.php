<?php

namespace app\shop\forms;

use app\shop\forms\meta\HistorySearchMeta;

class HistorySearch extends HistorySearchMeta
{
    /**
     * @var int
     */
    public $userId;

    /**
     * @param \yii\db\ActiveQuery $query
     */
    public function prepare($query)
    {
        parent::prepare($query);
        $query
            ->andWhere(['userId' => $this->userId])
            ->addOrderBy(['createTime' => SORT_DESC]);
    }
}
