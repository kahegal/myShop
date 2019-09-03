<?php

namespace app\user\models\meta;

use steroids\base\Model;
use steroids\behaviors\TimestampBehavior;
use \Yii;

/**
 * @property string $id
 * @property string $login
 * @property string $email
 * @property string $phone
 * @property string $role
 * @property string $passwordHash
 * @property string $sessionKey
 * @property string $language
 * @property string $lastLoginIp
 * @property string $createTime
 * @property string $updateTime
 * @property string $emailConfirmKey
 * @property string $emailConfirmTime
 * @property string $phoneConfirmKey
 * @property string $phoneConfirmTime
 * @property string $blockedTime
 * @property string $lastLoginTime
 * @property string $name
 * @property double $balance
 */
abstract class UserMeta extends Model
{
    public static function tableName()
    {
        return 'users';
    }

    public function fields()
    {
        return [
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name'], 'string', 'max' => 255],
            [['name', 'balance'], 'required'],
            [['createTime'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            ['balance', 'number'],
        ]);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            TimestampBehavior::class,
        ]);
    }

    public static function meta()
    {
        return array_merge(parent::meta(), [
            'id' => [
                'label' => Yii::t('app', 'ID'),
                'appType' => 'primaryKey'
            ],
            'createTime' => [
                'label' => Yii::t('app', 'Registration date'),
                'appType' => 'autoTime'
            ],
            'name' => [
                'label' => Yii::t('app', 'Name'),
                'isRequired' => true
            ],
            'balance' => [
                'label' => Yii::t('app', 'Баланс'),
                'appType' => 'double',
                'isRequired' => true
            ]
        ]);
    }
}
