<?php

namespace app\shop\migrations;

use steroids\base\Migration;

class M190707102016CreateUserHistory extends Migration
{
    public function safeUp()
    {
        $this->createTable('shop_user_histories', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'changeBalanceType' => $this->string()->notNull(),
            'createTime' => $this->dateTime(),
        ]);
        $this->createForeignKey('shop_user_histories', 'userId', 'users', 'id');
    }

    public function safeDown()
    {
        $this->deleteForeignKey('shop_user_histories', 'userId', 'users', 'id');
        $this->dropTable('shop_user_histories');
    }
}
