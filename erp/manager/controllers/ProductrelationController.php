<?php
namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\product\Product;
use app\erp\models\product\ProductBrand;
use app\erp\models\product\ProductCategory;
use app\erp\models\product\ProductColor;
use app\erp\models\product\ProductMaterial;
use app\erp\models\product\ProductPrice;
use app\erp\models\product\ProductRelation;
use app\erp\models\product\ProductSize;
use app\erp\util\SysConf;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;

class ProductrelationController extends ConfController {
    public $layout="form";
    public function actionIndex(){
        $model = Product::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['menu']['list'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $models = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("index", ['models' => $models, 'pager' => $pager]);
    }
    public function actionAdd(){
        $proid = Yii::$app->request->get('id');

        $post = Yii::$app->request->post();

        $transaction = Yii::$app->db->beginTransaction();
        try {
            if (Yii::$app->request->isPost) {
                $model = new ProductRelation();
                $color = new ProductColor();
                foreach ($post["ProductColor"] as $Color){
                    $color->name =  $Color["name"];
                    $color->name =  $Color["name"];
                }
                $size = new ProductSize();

                $price = new ProductPrice();

                return var_dump($post["ProductColor"]);

            }
            $transaction->commit();
        }catch(\Exception $e) {
            $transaction->rollback();
            return $this->redirect(['add',"id"=>$proid]);
        }

        return $this->render(
            'edit',[
                "product_id"=>$proid,
        ]);
    }
    public function actionEdit(){
        $get = Yii::$app->request->get();
        $id = $get['id'];
        $model = ProductRelation::findOne($id);
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($model->edit($post)){
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
            'model'=>$model,
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