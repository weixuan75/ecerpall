<?php
/**
 * Created by PhpStorm.
 * User: weixuan
 * Date: 2017/7/28
 * Time: 14:27
 */

namespace app\erp\manager\controllers;


use app\erp\admin\controllers\ConfController;
use app\erp\models\Purchase;
use app\erp\util\SysConf;
use Yii;
use yii\data\Pagination;

class PurchaseController extends ConfController{
    public $layout="form";
    public function actionIndex(){
        $model = Purchase::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $models = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index", ['models' => $models, 'pager' => $pager]);
    }
    public function actionAdd(){
        $model = new Purchase();
        $model->code= SysConf::uuid4("CG-");
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($model->add($post)){
                return $this->redirect(['index']);
            }else{
                var_dump($model->errors);
            }
        }
        return $this->render("edit", ['model' => $model]);
    }

}