<?php

namespace app\shop\models\meta;

use steroids\base\Model;
use app\shop\enums\BalanceTypeEnum;
use steroids\behaviors\TimestampBehavior;
use \Yii;
use yii\db\ActiveQuery;
use app\user\models\User;

/**
 * @property string $id
 * @property integer $userId
 * @property string $changeBalanceType
 * @property string $createTime
 * @property string $delta
 * @property-read User $user
 */
abstract class UserHistoryMeta extends Model
{
    public static function tableName()
    {
        return 'shop_user_histories';
    }

    public function fields()
    {
        return [
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            ['userId', 'integer'],
            [['userId', 'changeBalanceType', 'delta'], 'required'],
            ['changeBalanceType', 'in', 'range' => BalanceTypeEnum::getKeys()],
            ['delta', 'number'],
        ]);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            TimestampBehavior::class,
        ]);
    }

    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userId']);
    }

    public static function meta()
    {
        return array_merge(parent::meta(), [
            'id' => [
                'label' => Yii::t('app', 'ID'),
                'appType' => 'primaryKey'
            ],
            'userId' => [
                'label' => Yii::t('app', 'ID пользователя'),
                'appType' => 'relation',
                'isRequired' => true,
                'relationName' => 'user'
            ],
            'changeBalanceType' => [
                'label' => Yii::t('app', 'Тип изменения баланса'),
                'appType' => 'enum',
                'isRequired' => true,
                'enumClassName' => BalanceTypeEnum::class
            ],
            'createTime' => [
                'label' => Yii::t('app', 'Дата добавления'),
                'appType' => 'autoTime'
            ],
            'delta' => [
                'label' => Yii::t('app', 'Дельта'),
                'appType' => 'double',
                'isRequired' => true
            ]
        ]);
    }
}
