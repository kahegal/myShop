<?php

namespace app\user\models;

use app\user\models\meta\UserMeta;


class User extends UserMeta
{
    /**
     * @return array
     */
    public static function getAll()
    {
        return self::find()->select(['id', 'name', 'balance'])->orderBy(['id' => SORT_DESC])->asArray()->all();
    }

    /**
     * @param int|null $id
     * @return array
     */
    public static function getUser($id = null)
    {
        return $id
            ? self::find()->select(['id', 'name', 'balance'])->where(['id' => $id])->asArray()->one()
            : self::find()->select(['id', 'name', 'balance'])->orderBy(['id' => SORT_DESC])->asArray()->one();
    }
}
