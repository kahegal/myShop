<?php

namespace app\shop\models;

use app\shop\models\meta\UserHistoryMeta;

class UserHistory extends UserHistoryMeta
{
    public function fields()
    {
        return [
            'changeBalanceType',
            'createTime',
            'delta'
        ];
    }
}
