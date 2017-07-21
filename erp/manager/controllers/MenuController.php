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
        $managers = $model->getTreeList();
        return $this->render("index", ['managers' => $managers]);
    }
    public function actionAdd(){
        $Menu = new Menu();
        $option = $Menu->getOptions();
        $get = Yii::$app->request->get();
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
    public function actionState(){
        if(!(boolean)Yii::$app->request->get('id')
            &&!(Yii::$app->request->get('state')==1||Yii::$app->request->get('state')==0)){
            return $this->redirect(['/manager/menu']);
        }
        $id = Yii::$app->request->get('id');
        $state = Yii::$app->request->get('state');
        $reqURL = (boolean)Yii::$app->request->get('reqURL') ? Yii::$app->request->get('reqURL'): '/manager/menu';
        $model = Menu::findOne($id);
        $model->state = $state;
        if($model->update()&&LogUntils::write(Json::encode($model),$model->getPrimaryKey(),"state")){
            return $this->redirect($reqURL);
        }
        return $this->redirect($reqURL);
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
