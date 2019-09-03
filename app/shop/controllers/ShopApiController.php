<?php

namespace app\shop\controllers;

use app\shop\enums\BalanceTypeEnum;
use app\shop\forms\HistorySearch;
use app\shop\forms\ProductsSearch;
use app\shop\forms\PurchaseSearch;
use app\shop\models\Product;
use app\shop\models\Purchase;
use app\shop\models\UserHistory;
use app\shop\widgets\MainPage\MainPage;
use app\user\models\User;
use yii\web\Controller;

class ShopApiController extends Controller
{
    public $enableCsrfValidation = false;

    public static function siteMap()
    {
        return [
            'index' => [
                'label' => \Yii::t('app', 'Главная страница'),
                'url' => ['/shop/shop-api/index'],
                'urlRule' => '/',
            ],
            'create-user' => [
                'label' => \Yii::t('app', 'Создать пользователя'),
                'url' => ['/shop/shop-api/create-user'],
                'urlRule' => 'POST /user',
            ],
            'change-user' => [
                'label' => \Yii::t('app', 'Сменить пользователя'),
                'url' => ['/shop/shop-api/change-user'],
                'urlRule' => 'POST /user/change',
            ],
            'create-product' => [
                'label' => \Yii::t('app', 'Создать товар'),
                'url' => ['/shop/shop-api/create-product'],
                'urlRule' => 'POST /product',
            ],
            'charge-balance' => [
                'label' => \Yii::t('app', 'Пополнить баланс'),
                'url' => ['/shop/shop-api/charge-balance'],
                'urlRule' => 'POST /charge',
            ],
            'get-products' => [
                'label' => \Yii::t('app', 'Получить продукты'),
                'url' => ['/shop/shop-api/get-products'],
                'urlRule' => 'GET /product',
            ],
            'buy' => [
                'label' => \Yii::t('app', 'Купить'),
                'url' => ['/shop/shop-api/buy'],
                'urlRule' => 'POST /product/buy',
            ],
            'get-purchase' => [
                'label' => \Yii::t('app', 'Получить покупки'),
                'url' => ['/shop/shop-api/get-purchase'],
                'urlRule' => 'GET /purchase',
            ],
            'get-history' => [
                'label' => \Yii::t('app', 'Получить историю'),
                'url' => ['/shop/shop-api/get-history'],
                'urlRule' => 'GET /history',
            ],
        ];
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        $session = \Yii::$app->session;
        if (!$session->has('userId')) {
            $user = User::getUser();
            $session->set('userId', $user['id']);
        } else {
            $user = User::getUser($session->get('userId'));
        }

        return $this->renderContent(MainPage::widget([
            'user' => $user,
            'users' => User::getAll(),
            'averageCheck' => Purchase::GetAverageCheck()
        ]));
    }

    public function actionChangeUser()
    {
        \Yii::$app->session->set('userId', \Yii::$app->request->post('userId'));
        return [];
    }

    /**
     * @return User|array
     * @throws \Exception
     */
    public function actionCreateUser()
    {
        $model = new User();
        $model->load(\Yii::$app->request->post(), '');
        if (!$model->save()) {
            return $model;
        }
        return [
            'users' => User::getAll()
        ];
    }

    /**
     * @return Product|array
     * @throws \Exception
     */
    public function actionCreateProduct()
    {
        $model = new Product();
        $model->load(\Yii::$app->request->post(), '');
        if (!$model->save()) {
            return $model;
        }
        return [];
    }

    /**
     * @return array
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionChargeBalance()
    {
        $user = User::findOrPanic(\Yii::$app->request->post('id'));
        $balance = abs((int)\Yii::$app->request->post('balance'));
        $user->balance += $balance;
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $user->saveOrPanic();
            (new UserHistory([
                'userId' => $user->primaryKey,
                'changeBalanceType' => BalanceTypeEnum::CHARGE,
                'delta' => $balance
            ]))->saveOrPanic();
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
        return [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'balance' => $user->balance,
            ]
        ];
    }

    /**
     * @return array
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionBuy()
    {
        $user = User::findOrPanic(['id' => \Yii::$app->session->get('userId')]);
        $product = Product::findOrPanic(['id' => \Yii::$app->request->post('id'), ['<', 'price', $user->balance]]);
        $user->balance = $user->balance - $product->price;

        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $user->saveOrPanic();
            (new UserHistory([
                'userId' => $user->primaryKey,
                'changeBalanceType' => BalanceTypeEnum::BUY,
                'delta' => -$product->price
            ]))->saveOrPanic();
            (new Purchase([
                'userId' => $user->primaryKey,
                'productId' => $product->primaryKey,
            ]))->saveOrPanic();
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
        return [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'balance' => $user->balance,
            ],
            'averageCheck' => Purchase::GetAverageCheck()
        ];
    }

    /**
     * @return ProductsSearch
     */
    public function actionGetProducts()
    {
        $form = new ProductsSearch();
        $form->search(\Yii::$app->request->get());
        return $form;
    }

    /**
     * @return PurchaseSearch
     */
    public function actionGetPurchase()
    {
        $form = new PurchaseSearch();
        $form->search(\Yii::$app->request->get());
        return $form;
    }

    /**
     * @return HistorySearch
     */
    public function actionGetHistory()
    {
        $form = new HistorySearch();
        $form->userId = \Yii::$app->session->get('userId');
        $form->search(\Yii::$app->request->get());
        return $form;
    }

}
