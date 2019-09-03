<?php

namespace app\shop\migrations;

use steroids\base\Migration;

class M190831064604UserHistoryAddDelta extends Migration
{
    public function safeUp()
    {
        $this->addColumn('shop_user_histories', 'delta', $this->decimal(19,2)->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('shop_user_histories', 'delta');
    }
}
