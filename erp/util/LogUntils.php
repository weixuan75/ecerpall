<?php
/**
 * Created by PhpStorm.
 * User: femy
 * Date: 2017/7/19
 * Time: 8:04
 */

namespace app\erp\util;


use app\erp\models\LogSysAdmin;
use yii\helpers\Json;
use Yii;

class LogUntils
{

    public static function write($str,$modelId,$tag){;
        $s = new LogSysAdmin();
        $session = Yii::$app->session;
        $redis = Yii::$app->redis;
        $user_id = Json::decode($redis->get($session['userData']['user']['auth_code']))['user']['id'];
        $s->admin_id = $user_id;
        $s->content = $str;
        $s->model_id = $modelId;
        $s->tag = $tag;
        $s->time = time();
        $s->save();
        return Json::encode($s->errors);
    }
}