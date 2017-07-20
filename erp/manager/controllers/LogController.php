<?php

namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\LogSysAdmin;
use app\erp\models\Menu;
use app\erp\util\LogUntils;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;

/**
 * Default controller for the `manager` module
 */
class LogController extends ConfController {
    public $layout="js";
    public function actionIndex(){
        $model = LogSysAdmin::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $managers = $model->offset($pager->offset)->limit($pager->limit)->orderBy("id desc")->all();
        return $this->render("index", ['managers' => $managers, 'pager' => $pager]);
    }
}
