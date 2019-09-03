<?php

namespace app\shop\models\meta;

use steroids\base\Model;
use steroids\behaviors\TimestampBehavior;
use \Yii;
use yii\db\ActiveQuery;
use app\shop\models\Purchase;

/**
 * @property string $id
 * @property string $title
 * @property string $price
 * @property string $createTime
 * @property-read Purchase[] $purchases
 */
abstract class ProductMeta extends Model
{
    public static function tableName()
    {
        return 'shop_product';
    }

    public function fields()
    {
        return [
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(), [
            ['title', 'string', 'max' => 255],
            [['title', 'price'], 'required'],
            ['price', 'number'],
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
    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['productId' => 'id']);
    }

    public static function meta()
    {
        return array_merge(parent::meta(), [
            'id' => [
                'label' => Yii::t('app', 'ID'),
                'appType' => 'primaryKey'
            ],
            'title' => [
                'label' => Yii::t('app', 'Название'),
                'isRequired' => true
            ],
            'price' => [
                'label' => Yii::t('app', 'Цена'),
                'appType' => 'double',
                'isRequired' => true
            ],
            'createTime' => [
                'label' => Yii::t('app', 'Время добавления'),
                'appType' => 'autoTime'
            ]
        ]);
    }
}
