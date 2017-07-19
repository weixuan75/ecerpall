<?php
/**
 * Created by PhpStorm.
 * User: weixuan
 * Date: 2017/7/19
 * Time: 11:57
 */

namespace app\erp\util;
use Yii;
use yii\helpers\Json;


class UserUtil
{
    public static function UserId(){
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        $user_id = Json::decode($redis->get($session['userData']['user']['auth_code']));
        return $user_id;
    }
}