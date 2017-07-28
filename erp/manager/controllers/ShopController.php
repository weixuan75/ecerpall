<?php

namespace app\erp\manager\controllers;

use app\erp\admin\controllers\UserController;
use app\erp\models\AuthPeople;
use app\erp\models\shop\Shop;
use app\erp\models\shop\ShopAddress;
use app\erp\models\shop\ShopFinance;
use app\erp\models\shop\ShopUser;
use app\erp\util\SysConf;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `manager` module
 */
class ShopController extends Controller
{
    public $layout="form";
//    public $layout=false;
    public function actionIndex(){
        $model = Shop::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $models = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index", ['models' => $models, 'pager' => $pager]);
    }
    public function actionAdd(){
        $Shop = new Shop();
        $finance = new ShopFinance();
        $address = new ShopAddress();
        $user = new ShopUser();
        $authPeople = new AuthPeople();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($Shop->add($post)&&$finance->add($post)&&$address->add($post)&&$address->add($post)&&$authPeople->add($post)){
                return $this->redirect(['/manager/shop']);
            }else{
                var_dump($Shop->errors);
            }
        }
        return $this->render(
            'edit',[
            'model'=>$Shop,
            "finance"=>$finance,
            "address"=>$address,
            "authPeople"=>$authPeople,
            "user"=>$user

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
