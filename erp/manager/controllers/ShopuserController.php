<?php

namespace app\erp\manager\controllers;

use app\erp\models\shop\Shop;
use app\erp\shop\models\ShopUser;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `manager` module
 */
class ShopuserController extends Controller
{
    public $layout="form";
//    public $layout=false;
    public function actionIndex(){
        $model = ShopUser::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $models = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index", ['models' => $models, 'pager' => $pager]);
    }

    public function actionAdd(){
        $user = new ShopUser();
        $shop = new Shop();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($user->add($post)){
                return $this->redirect(['shopuser/index']);
            }else{
                var_dump($user->errors);
            }
        }
        return $this->render(
            'edit',[
            "user"=>$user,
            "shoplist"=>$shop->getData(),
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
