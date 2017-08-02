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
use app\erp\models\product\WarehouseProductStock;
use app\erp\util\SysConf;
use app\erp\util\UserUtil;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\Controller;

class ProductrelationController extends Controller {
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
        return $this->render(
            'edit',[
            "product_id"=>$proid,
        ]);
    }

    public function actionAddok(){
        $post = Yii::$app->request->post();
        $proid = $post["product_id"];
//        var_dump($post);
        $transaction = Yii::$app->db->beginTransaction();
        $error["start"] = [];
        try {
            if (Yii::$app->request->isPost) {
                foreach ($post["ProductColor"] as $key => $Color){
                    $color = new ProductColor();
                    $color->name =  $Color["name"];
                    $color->image =  $Color["imgSrc"];
                    $color->product_id =  $proid;
                    $color->create_time =  time();
                    if (!$color->save()) {
                        $error["ProductColor"] = [$color->errors];
                        throw new \Exception();
                    }
                    foreach ($post["ProductRelation"][$key] as $r){
                            $size = new ProductSize();
                            $size->name=$r['size'];//'name' => '产品的尺寸',
                            $size->product_id = $proid;//'product_id' => '产品的id',
                            $size->color_id = $color->getPrimaryKey();//'color_id' => '颜色的id',
                            $size->barcode = $r['barcode'];//'barcode' => '产品条码',
                            $size->create_time = time();//'create_time' => '创建时间',
                            if (!$size->save()) {
                                throw new \Exception();
                            }
                            $model = new ProductRelation();
                            $price = new ProductPrice();
                            $stock = new WarehouseProductStock();
                            $price->product_id = $proid;
                            $price->cost = $r['price']? $r['price']:0;
                            if(!empty($r['price_id'])){
                                $price->cost = $r['price_id'];
                            }
                            $price->user_id = UserUtil::UserId();
                            if (!$price->save()) {
                                throw new \Exception();
                            }
                            $model->product_id = $proid;
                            $model->color_id = $color->getPrimaryKey();
                            $model->size_id = $size->getPrimaryKey();
                            $model->price_id = $price->getPrimaryKey();
                            if (!$model->save()) {
                                throw new \Exception();
                            }
                            $error["ProductRelation"]["relation"][] = [$model->errors];

                            $stock->product_id = $proid;
                            $stock->product_relation_id = $model->getPrimaryKey();
                            $stock->user_id = UserUtil::UserId();
                            $stock->type = "+";
                            $stock->num = $r["stock"] ? $r["stock"] :0;
                            $stock->stockNum = $r["stock"] ? $r["stock"] :0;
                            $stock->state = 30;
                            $stock->create_time = $stock->update_time = time();
                            if (!$stock->save()) {
                                throw new \Exception();
                            }
                    }
                }
            }
            $transaction->commit();
            return $this->redirect(['/manager/warehouseproductstock/index']);
        }catch(\Exception $e) {
            echo Json::encode($error);
            $transaction->rollback();
            return $this->redirect(['add',"id"=>$proid]);
        }
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