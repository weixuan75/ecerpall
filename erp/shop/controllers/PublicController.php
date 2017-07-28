<?php

namespace app\erp\shop\controllers;

use app\erp\shop\models\ShopUser;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `admin` module
 */
class PublicController extends Controller{
    public $layout = false;
    /**
     * 登陆
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['login']);
    }
    public function actionLogin(){
        $this->layout = false;
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        if((boolean)$redis->get($session['ShopUserData']['user']['key_code'])){
            return $this->redirect(['/shop/default']);
        };
        $admin = new ShopUser();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if ($admin->login($post)){
                return $this->redirect(['/shop/default']);
            }
        }
        return $this->render(
            'login',
            ["admin"=>$admin]);
    }
    public function actionLogout(){
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        $redis->del($session['ShopUserData']['user']['auth_code']);
        $session->removeAll();
        return $this->redirect(['login']);
    }
}
