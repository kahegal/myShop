<?php

namespace app\shop\forms\meta;

use steroids\base\SearchModel;
use app\shop\models\UserHistory;

abstract class HistorySearchMeta extends SearchModel
{


    public function sortFields()
    {
        return [

        ];
    }

    public function createQuery()
    {
        return UserHistory::find();
    }

    public static function meta()
    {
        return [

        ];
    }
}
