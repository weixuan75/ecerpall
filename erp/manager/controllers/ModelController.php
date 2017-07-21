<?php

namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\Model;
use app\erp\util\LogUntils;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;

/**
 * Default controller for the `manager` module
 */
class ModelController extends ConfController {
    public $layout="js";
    public function actionIndex(){
        $model = Model::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $models = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index", ['model' => $models, 'pager' => $pager]);
    }
    public function actionAdd(){
        $model = new Model();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($model->add($post)){
                return $this->redirect(['model/index']);
            }else{
                var_dump($model->errors);
            }
        }
        return $this->render(
            'edit',[
                'model'=>$model
        ]);
    }
    public function actionEdit(){
        $id = Yii::$app->request->get('id');
        $model = Model::findOne($id);
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($model->edit($post)){
                return $this->redirect(['model/']);
            }else{
                var_dump($model->errors);
            }
        }
        return $this->render(
            'edit',[
            'model'=>$model
        ]);
    }
    public function actionState(){
        if(!(boolean)Yii::$app->request->get('id')
            &&!(Yii::$app->request->get('state')==1||Yii::$app->request->get('state')==0)){
            return $this->redirect(['/manager/model']);
        }
        $id = Yii::$app->request->get('id');
        $state = Yii::$app->request->get('state');
        $reqURL = (boolean)Yii::$app->request->get('reqURL') ? Yii::$app->request->get('reqURL'): '/manager/model';
        $model = Model::findOne($id);
        $model->state = $state;
        if($model->update()&&LogUntils::write(Json::encode($model),$model->getPrimaryKey(),"state")){
            return $this->redirect($reqURL);
        }
        return $this->redirect($reqURL);
    }

    public function actionDel(){
        $id = Yii::$app->request->get('id');
        $reqURL = Yii::$app->request->get('reqURL');
        $model = Model::findOne($id);
        if($model->delete()&&LogUntils::write(Json::encode($model),2,"del")){
            return $this->redirect($reqURL);
        }
        return $this->redirect($reqURL);
    }
}
