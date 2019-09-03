<?php

namespace app\shop\migrations;

use steroids\base\Migration;

class M190707100509CreateProduct extends Migration
{
    public function safeUp()
    {
        $this->createTable('shop_product', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->decimal(19,2)->notNull(),
            'createTime' => $this->dateTime(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('shop_product');
    }
}
