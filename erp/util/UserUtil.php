<?php
/**
 * Created by PhpStorm.
 * User: weixuan
 * Date: 2017/7/19
 * Time: 11:57
 */

namespace app\erp\util;
use app\erp\models\Sysadmin;
use app\erp\models\Sysadmindate;
use Yii;
use yii\helpers\Json;


class UserUtil
{
    //用户ID
    public static function UserId(){
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        $user = Json::decode($redis->get($session['userData']['user']['auth_code']));
        $user_id = $user['user']['id'];
        return $user_id;
    }
    //用户账号
    public static function UserAcc(){
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        $user = Json::decode($redis->get($session['userData']['user']['auth_code']));
        $account = $user['user']['account'];
        return $account;
    }
    //用户电子邮箱
    public static function UserEmail(){
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        $user = Json::decode($redis->get($session['userData']['user']['auth_code']));
        $email = $user['user']['email'];
        return $email;
    }
    //用户昵称
    public static function UserNickname(){
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        $user = Json::decode($redis->get($session['userData']['user']['auth_code']));
        $nickname = $user['data']['nickname'];
        return $nickname;
    }
    public static function getUserNickname($id){
        $admin = Sysadmindate::findOne($id);
        return $admin;
    }
}