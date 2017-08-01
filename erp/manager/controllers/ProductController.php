<?php
namespace app\erp\manager\controllers;
use app\erp\admin\controllers\ConfController;
use app\erp\models\product\Product;
use app\erp\models\product\ProductBrand;
use app\erp\models\product\ProductCategory;
use app\erp\models\product\ProductMaterial;
use app\erp\util\LogUntils;
use app\erp\util\SysConf;
use Yii;
use yii\data\Pagination;
use yii\helpers\Json;

class ProductController extends ConfController {
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
        $model = new Product();
        $model->sn = SysConf::uuid4("pro-");
        $productMater = new ProductMaterial();
        $mater = $productMater->getData();
        $ProductBrand = new ProductBrand();
        $brand = $ProductBrand->getData();
        $ProductCategory = new ProductCategory();
        $Category = $ProductCategory->getData();
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            if($model->add($post)){
                return $this->redirect(['productrelation/add',"id"=>$model->getPrimaryKey()]);
            }else{
                var_dump($model->errors);
            }
        }
        return $this->render(
            'edit',[
            'model'=>$model,
            'mater'=>$mater,
            'brand'=>$brand,
            'category'=>$Category,
        ]);
    }
    public function actionEdit(){
        $get = Yii::$app->request->get();
        $id = $get['id'];
        $model = Product::findOne($id);


        $productMater = new ProductMaterial();
        $mater = $productMater->getData();
        $ProductBrand = new ProductBrand();
        $brand = $ProductBrand->getData();
        $ProductCategory = new ProductCategory();
        $Category = $ProductCategory->getData();

//        $option = $model->getOptions();
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
            'mater'=>$mater,
            'brand'=>$brand,
            'category'=>$Category,
        ]);
    }
    public function actionShow(){
        $get = Yii::$app->request->get();
        $id = $get['id'];
        $model = Product::findOne($id);

        $productMater = new ProductMaterial();
        $mater = $productMater->getData();
        $ProductBrand = new ProductBrand();
        $brand = $ProductBrand->getData();
        $ProductCategory = new ProductCategory();
        $Category = $ProductCategory->getData();

//        $option = $model->getOptions();
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
            'mater'=>$mater,
            'brand'=>$brand,
            'category'=>$Category,
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
        $model = Product::findOne($id);
        if($model->delete()&&LogUntils::write(Json::encode($model),28,"del")){
            return $this->redirect($reqURL);
        }
        return $this->redirect($reqURL);
    }
}