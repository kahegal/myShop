<?php

namespace app\shop\models\meta;

use steroids\base\Model;
use steroids\behaviors\TimestampBehavior;
use \Yii;
use yii\db\ActiveQuery;
use app\user\models\User;
use app\shop\models\Product;

/**
 * @property string $id
 * @property integer $userId
 * @property integer $productId
 * @property string $createTime
 * @property-read User $user
 * @property-read Product $product
 */
abstract class PurchaseMeta extends Model
{
    public static function tableName()
    {
        return 'shop_purchases';
    }

    public function fields()
    {
        return [
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['userId', 'productId'], 'integer'],
            [['userId', 'productId'], 'required'],
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

    /**
     * @return ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'productId']);
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
            'productId' => [
                'label' => Yii::t('app', 'ID товара'),
                'appType' => 'relation',
                'isRequired' => true,
                'relationName' => 'product'
            ],
            'createTime' => [
                'label' => Yii::t('app', 'Дата добавления'),
                'appType' => 'autoTime'
            ]
        ]);
    }
}
