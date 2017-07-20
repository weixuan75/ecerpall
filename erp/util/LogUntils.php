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
        $s->admin_id = UserUtil::UserId();
        $s->content = $str;
        $s->model_id = $modelId;
        $s->tag = $tag;
        $s->time = time();
        $s->save();
        return Json::encode($s->errors);
    }
}