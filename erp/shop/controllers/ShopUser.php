<?php

namespace app\erp\shop\controllers;
use yii\web\Controller;
use Yii;
/**
 * Default controller for the `admin` module
 */
class ShopUser extends Controller{
    public function init()
    {
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        if (!(boolean)$redis->get($session['ShopUserData']['user']['key_code'])) {
            return $this->redirect(['/shop/public/login']);
        }
    }
}
