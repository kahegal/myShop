<?php

namespace app\user\migrations;

use steroids\base\Migration;

class M180609040638CreateUser extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'balance' => $this->double(2)->notNull(),
            'createTime' => $this->dateTime(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
