<?php
namespace app\erp\util;

use app\erp\models\LogSysAdmin;

class logUtil{
    public static function addSysadmin($data){
        $log = new LogSysAdmin();
        return $log->add($data);
    }
}