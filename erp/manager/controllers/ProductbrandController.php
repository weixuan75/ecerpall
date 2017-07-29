<?php
namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\product\ProductBrand;
use Yii;
use yii\data\Pagination;

class ProductbrandController extends ConfController {
    public $layout="form";
    public function actionIndex(){
        $model = ProductBrand::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $models = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index", ['models' => $models, 'pager' => $pager]);
    }

    public function actionAdd(){
        $model = new ProductBrand();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($model->add($post)){
                if(!empty($get["reqURL"])){
                    return $this->redirect($get["reqURL"]);
                }else{
                    return $this->redirect(['index']);
                }
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