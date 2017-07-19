<?php

namespace app\erp\app\controllers;
use app\erp\util\ValidateCode;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `manager` module
 */
class CaptchaController extends Controller {
    public function actionIndex(){
        $vc = new ValidateCode();  //实例化一个对象
        $vc->doimg();
        $session = Yii::$app->session;
        $session['captchaCode'] = $vc->getCode();
//        $_SESSION['authnum_session'] = $vc->getCode();//验证码保存到SESSION中
//        echo dirname(dirname(dirname(dirname(__FILE__))))."/web/admin/fonts/ELEPHNT.TTF";
    }
}
