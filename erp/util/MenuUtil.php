<?php
/**
 * Created by PhpStorm.
 * User: femy
 * Date: 2017/7/19
 * Time: 11:43
 */

namespace app\erp\util;

use app\erp\models\Menu;
class MenuUtil
{
 static function getList(){
     return Menu::getMenu(0);
 }
}