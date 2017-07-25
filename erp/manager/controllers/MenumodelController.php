<?php

namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\Menu;
use app\erp\models\Model;
use app\erp\models\ModelMenu;
use app\erp\models\Platform;
use app\erp\util\LogUntils;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Default controller for the `manager` module
 */
class MenumodelController extends ConfController {
    public $layout="js";
    public function actionIndex(){
        $model = Model::find()->with("menu")->all();
        $arr = [];
        foreach ($model as $m){
            $a=$m->toArray();
            $a["data"] = $m['menu'];
            $arr[] = $a;
//            var_dump($m["menu"]);
//            var_dump($m["menu"]);
//            foreach ($m["modelMenu"] as $mm){
//                var_dump(Menu::findOne($mm["menu_id"]));
//            }
        }
        echo Json::encode($arr);
//        return $this->render("index", ['models' => $model, 'pager' => $pager]);
    }
    public function actionAdd(){
        $platform = new Platform();
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
    public function actionEdit(){
        $id = Yii::$app->request->get('id');
        $platform = Platform::findOne($id);
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
        $model = Menu::findOne($id);
        if($model->delete()&&LogUntils::write(Json::encode($model),3,"del")){
            return $this->redirect($reqURL);
        }
        return $this->redirect($reqURL);
    }
}
