<?php

namespace app\shop\widgets\MainPage;

use app\core\base\AppWidget;
use app\user\models\User;
use phpDocumentor\Reflection\Types\Array_;

class MainPage extends AppWidget
{
    /**
     * @var User
     */
    public $user;

    /**
     * @var array
     */
    public $users;

    /**
     * @var array
     */
    public $products;

    /**
     * @var double
     */
    public $averageCheck;


    public function run()
    {
        return $this->renderReact([
            'user' => $this->user,
            'users' => $this->users,
            'products' => $this->products,
            'averageCheck' => $this->averageCheck
        ]);
    }
}