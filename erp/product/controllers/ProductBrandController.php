<?php

namespace app\erp\product\controllers;

use Yii;
use app\erp\product\models\ProductBrand;
use app\erp\product\models;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductBrandController implements the CRUD actions for ProductBrand model.
 */
class ProductBrandController extends Controller
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
     * Lists all ProductBrand models.
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
     * Displays a single ProductBrand model.
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
     * Creates a new ProductBrand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductBrand();
        if(Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $model->name = $post['name'];
            $model->create_time = time()."";
            $model->update_time = time()."";
            if($model->validate() && $model->save())
            {
                return Json::encode(['code'=>1, 'msg'=>'创建成功！']);
            }
            else
            {
                return Json::encode(['code'=>0, 'msg'=>'创建失败！']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductBrand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $model = $this->findModel($post['id']);
            $model->name = $post['name'];
            $model->update_time = time()."";
            if($model->validate() && $model->save())
            {
                return Json::encode(['code'=>1, 'msg'=>'更新成功！']);
            }
            else
            {
                return Json::encode(['code'=>0, 'msg'=>'更新失败！']);
            }
        } else if(Yii::$app->request->isGet){
            $model = $this->findModel(Yii::$app->request->get('id'));
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductBrand model.
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
     * Finds the ProductBrand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductBrand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductBrand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
