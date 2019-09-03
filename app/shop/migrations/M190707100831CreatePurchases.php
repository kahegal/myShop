<?php

namespace app\shop\migrations;

use steroids\base\Migration;

class M190707100831CreatePurchases extends Migration
{
    public function safeUp()
    {
        $this->createTable('shop_purchases', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'productId' => $this->integer()->notNull(),
            'createTime' => $this->dateTime(),
        ]);
        $this->createForeignKey('shop_purchases', 'userId', 'users', 'id');
        $this->createForeignKey('shop_purchases', 'productId', 'shop_product', 'id');
    }

    public function safeDown()
    {
        $this->deleteForeignKey('shop_purchases', 'userId', 'users', 'id');
        $this->deleteForeignKey('shop_purchases', 'productId', 'shop_product', 'id');
        $this->dropTable('shop_purchases');
    }
}
