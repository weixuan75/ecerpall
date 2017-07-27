<?php

namespace app\erp\shop\controllers;

use app\erp\models\Menu;
use app\erp\models\SysAttachment;
use yii\web\Controller;
use Yii;
/**
 * Default controller for the `admin` module
 */
class ConfController extends Controller{
    public $platformId;
    public function init(){
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        if(!(boolean)$redis->get($session['userData']['user']['auth_code'])){
            return $this->redirect(['/shop/public/login']);
        }
    }
}
