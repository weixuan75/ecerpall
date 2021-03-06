<?php

namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\Menu;
use app\erp\util\LogUntils;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;

class MenuController extends ConfController {
    public $layout="form";
    public function actionIndex(){
        $model = new Menu();
        $managers = $model->getTreeList();
        return $this->render("index", ['managers' => $managers]);
    }
    public function actionAdd(){
        $Menu = new Menu();
        $option = $Menu->getOptions();
        $get = Yii::$app->request->get();
        if(!empty($get['id'])){
            $Menu->menu_pid = $get['id'];
        }
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($Menu->add($post)){
                if(!empty($get["reqURL"])){
                    return $this->redirect($get["reqURL"]);
                }else{
                    return $this->redirect(['index']);
                }
            }else{
                var_dump($Menu->errors);
            }
        }
        return $this->render(
            'edit',[
            'menu'=>$Menu,
            'option'=>$option
        ]);
    }
    public function actionEdit(){
        $get = Yii::$app->request->get();
        $id = $get['id'];
        $Menu = Menu::findOne($id);
        $option = $Menu->getOptions();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($Menu->edit($post)){
                if(!empty($get["reqURL"])){
                    return $this->redirect($get["reqURL"]);
                }else{
                    return $this->redirect(['index']);
                }
            }else{
                var_dump($Menu->errors);
            }
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
            return $this->redirect(['index']);
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
