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
    public $layout = false;
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
            //用户填写了颜色值
            if(isset($post['product_color']))
            {
                $colors = $post["product_color"];
                unset($post["product_color"]);
            }
            var_dump($post);
            $model->sn = md5(md5($model->name."".time()."1")."1");               //店铺id+当前时间戳+商品名+用户id
            $model->create_time = time()."";
            $model->image = "";
            $model->user_id = 0;
            $model->shop_id = 0;
            $model->tag_id = 1;

            if($model->validate())
            {
                echo "fadjfaldjfaldfjakdfadlk";
            }

            if($model->validate() && $model->save())
            {
                return Json::encode(['code'=>1, 'msg'=>'添加产品成功！']);
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
