<?php

namespace app\shop\migrations;

use yii\db\Migration;


class M190708074427AddData extends Migration
{

    public function safeUp()
    {
        //пользователи
        $this->batchInsert('users', ['name', 'balance', 'createTime'], [
            ['Иван', 1000, date('Y-m-d H:i:s')],
            ['Степан', 2000, date('Y-m-d H:i:s')],
            ['Александр', 2000, date('Y-m-d H:i:s')],
            ['Виктор', 2000, date('Y-m-d H:i:s')]
        ]);

        //товары
        $this->batchInsert('shop_product', ['title', 'price', 'createTime'], [
            ['Наушники', 700, date('Y-m-d H:i:s')],
            ['Телефон', 15000, date('Y-m-d H:i:s')],
            ['Телевизор', 20000, date('Y-m-d H:i:s')],
            ['Ноутбук', 50000, date('Y-m-d H:i:s')],
            ['Планшет', 30000, date('Y-m-d H:i:s')],
            ['Монитор', 7000, date('Y-m-d H:i:s')],
            ['Чехол', 100, date('Y-m-d H:i:s')],
            ['Принтер', 2500, date('Y-m-d H:i:s')],
            ['Сканер', 5000, date('Y-m-d H:i:s')],
            ['Смарт-часы', 25000, date('Y-m-d H:i:s')],
            ['Мышь', 1300, date('Y-m-d H:i:s')],
            ['Клавиатура', 1500, date('Y-m-d H:i:s')],
            ['Флешка', 600, date('Y-m-d H:i:s')],
            ['Монолок', 160000, date('Y-m-d H:i:s')],
            ['Веб камера', 900, date('Y-m-d H:i:s')],
            ['Системный блок', 19000, date('Y-m-d H:i:s')],
            ['МФУ', 17000, date('Y-m-d H:i:s')],
            ['Картридж', 1300, date('Y-m-d H:i:s')],
            ['Кабель', 500, date('Y-m-d H:i:s')],
            ['Карта памяти', 500, date('Y-m-d H:i:s')],
            ['3D ручка', 3900, date('Y-m-d H:i:s')],
            ['Ламинатор', 2900, date('Y-m-d H:i:s')]
        ]);
    }


    public function safeDown()
    {
        $this->truncateTable('users');
        $this->truncateTable('shop_product');
    }


}
