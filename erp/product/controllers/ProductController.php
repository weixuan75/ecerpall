<?php

namespace app\erp\product\controllers;

use Yii;
use app\erp\product\models\Product;
use app\erp\product\models;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\erp\product\models\ProductCategory;
use app\erp\product\models\ProductBrand;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public $layout = "form";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new models();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    //添加 颜色和尺寸
    public function addColorSize($table_color_size, $product_id){
        $image = unserialize(Yii::$app->session['files_images']);
     //   echo count($image)."<br />";
    //    echo count($table_color_size)."<br />";

        if(count($image) != count($table_color_size))
        {
            FileController::clear();                    //清除上传的图片缓存和图片文件
            return ;
        }
        foreach($table_color_size as $key=>$val)
        {
            //插入每一条的颜色信息
            $color = $val['color_val'];
            $sizes = $val['size_val'];
            $model_color = new models\ProductColor();
            $model_color->name = $color;
            $model_color->create_time = time()."";
            $model_color->product_id = $product_id;
            $model_color->image = $image[$key];

            if($model_color->save())
            {
                foreach($sizes as $key=>$size)
                {
                    $model_size = new models\ProductSize();
                    $model_size->name = $size;
                    $model_size->color_id = $model_color->id;
                    $model_size->product_id = $product_id;
                    $model_size->create_time = time()."";
                    if($model_size->save())
                    {

                    }
                }
            }
        }
        FileController::clearCache();                       //清理上传的图片缓存
        return true;
    }
    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            $table_color_size = $post['color_size'];
            //用户填写了颜色值
            if(isset($post['product_color']))
            {
                $colors = $post["product_color"];
                unset($post["product_color"]);
            }
            unset($post['color_size']);
            $model->loads($post);
            $model->sn = md5(md5($model->name."".time()."1")."1");               //店铺id+当前时间戳+商品名+用户id
            $model->create_time = time()."";
            $model->image = "";
            $model->user_id = 0;
            $model->shop_id = 0;
            $model->tag_id = 1;

            if($model->validate() && $model->save())
            {
//                foreach($table_color_size as $key=>$val)
                {
                    if ($this->addColorSize($table_color_size, $model->id))
                    {
                        return Json::encode(['code'=>1, 'msg'=>'添加产品成功！']);
                    }
                    else
                    {

                    }
                }
                return Json::encode(['code'=>1, 'msg'=>'添加产品成功！', "id"=>$model->id]);
            }
            else
            {
                return Json::encode(['code'=>1, 'msg'=>'添加产品失败！']);
            }
        }
        else
        {
//            return Json::encode(ProductCategory::find()->all());
            return $this->render("create",
                ['model' =>$model,
                'categorys'=>ProductCategory::find()->all(),
                'brands'=>ProductBrand::find()->all()]);
        }
        return 0;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
