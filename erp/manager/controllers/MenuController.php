<?php

namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\Menu;
use app\erp\util\LogUntils;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;

/**
 * Default controller for the `manager` module
 */
class MenuController extends ConfController {
    public $layout="js";
    public function actionIndex(){
        $model = new Menu();
        $managers = $model::getMenu(0);
        return $this->render("index", ['managers' => $managers]);
    }
    public function actionAdd(){
        $Menu = new Menu();
        $option = $Menu->getOptions();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($Menu->add($post)){
                return $this->redirect(['/manager/menu']);
            }else{
                var_dump($Menu->errors);
            }
//            return LogUntils::write(Json::encode($post['Menu']),$Menu->getPrimaryKey(),"add");
        }
        return $this->render(
            'edit',[
            'menu'=>$Menu,
            'option'=>$option
        ]);
    }
    public function actionEdit(){
        $id = Yii::$app->request->get('id');
        $Menu = Menu::findOne($id);
        $option = $Menu->getOptions();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($Menu->edit($post)){
                return $this->redirect(['/manager/menu']);
            }else{
                var_dump($Menu->errors);
            }
//            return LogUntils::write(Json::encode($post['Menu']),$Menu->getPrimaryKey(),"add");
        }
        return $this->render(
            'edit',[
            'menu'=>$Menu,
            'option'=>$option
        ]);
    }
}
