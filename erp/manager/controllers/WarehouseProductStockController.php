<?php
namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\admin\models\Sysadmin;
use app\erp\models\product\ProductRelation;
use app\erp\models\product\WarehouseProductStock;
use app\erp\models\Sysadmindate;
use yii\data\Pagination;
use Yii;

/**
 * Default controller for the `admin` module
 */
class WarehouseproductstockController extends ConfController {
//warehouseproductstock
    public $layout="form";
    public function actionIndex(){
        //
        $model = WarehouseProductStock::find()->with(["product","productSize","productColor"]);
//        var_dump($model->product);
//        var_dump($model->productSize);
//        var_dump($model->productColor);
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $models = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index", ['models' => $models, 'pager' => $pager]);
    }
}