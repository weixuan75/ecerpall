<?php

namespace app\erp\manager\controllers;

use app\erp\admin\controllers\UserController;
use app\erp\models\shop\Shop;
use app\erp\models\shop\ShopFinance;
use app\erp\util\LogUntils;
use app\erp\util\SysConf;
use yii\helpers\Json;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `manager` module
 */
class ShopfinanceController extends Controller
{
    public $layout="js";
//    public $layout=false;
    public function actionIndex(){
//        echo SysConf::uuid20("s");
//        $model = Shop::find()->all();
//        $arr = [];
//        foreach ($model as $m){
//            $a=$m->toArray();
//            $a["data"] = $m['menu'];
//            $arr[] = $a;
//        }
//        echo Json::encode($arr);
//        return $this->render("index", ['models' => $model, 'pager' => $pager]);
    }
    public function actionAdd(){
        $Shop = new Shop();
        $shopfinance = new ShopFinance();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($Shop->add($post)){
                return $this->redirect(['/manager/shop']);
            }else{
                var_dump($Shop->errors);
            }
        }
        return $this->render(
            'edit',[
            'model'=>$Shop,
            'finance'=>$shopfinance
        ]);
    }
    public function actionEdit(){
        $id = Yii::$app->request->get('id');
        $platform = ShopFinance::findOne($id);
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($platform->add($post)){
                return $this->redirect(['/manager/platform']);
            }else{
                var_dump($platform->errors);
            }
        }
        return $this->render(
            'edit',[
            'platform'=>$platform
        ]);
    }
    public function actionDel(){
        $id = Yii::$app->request->get('id');
        $reqURL = (boolean)Yii::$app->request->get('reqURL') ? Yii::$app->request->get('reqURL'): '/manager/menu';
        $model = ShopFinance::findOne($id);
        if($model->delete()&&LogUntils::write(Json::encode($model),26,"del")){
            return $this->redirect($reqURL);
        }
        return $this->redirect($reqURL);
    }
}
