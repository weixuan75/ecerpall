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

class LogUntils
{

    public static function write($userId,$str){;
        $s = new LogSysAdmin();
        $s->admin_id = $userId;
        $s->content = $str;
        $s->time = time();
        //$s->load();
        $s->save();
        return Json::encode($s->errors);
    }
}