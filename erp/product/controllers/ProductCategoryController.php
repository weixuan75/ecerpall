<?php

namespace app\erp\product\controllers;

use Yii;
use app\erp\product\models\ProductCategory;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductCategoryController implements the CRUD actions for ProductCategory model.
 */
class ProductCategoryController extends Controller
{
    public $layout = false;

    /**
     * @inheritdoc
     */
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
     * Lists all ProductCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ProductCategory::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single ProductCategory model.
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
     * Creates a new ProductCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductCategory();

        if (Yii::$app->request->isPost) {
            //$post = Yii::$app->request->post();
            //unset($post['_csrf']);
            $model->loads(Yii::$app->request->post());
            //$model->name = Yii::$app->request->post("name");
            $model->create_time = time() . "";
            $model->update_time = time() . "";
            if ($model->validate() && $model->save()) {
                return Json::encode(['code' => 1, 'msg' => '创建成功！']);
            } else {
                return Json::encode(['code' => 0, 'msg' => '创建失败！']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing ProductCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $id = -1;
        if($request->isGet)
            $id = $request->get("id");
        else if($request->isPost)
            $id = $request->post("id");

        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            //unset($post['_csrf']);
            $model->name = $post['name'];
            $model->update_time = time()."";
            if($model->validate() && $model->save())
            {
                return Json::encode(['code'=>1, 'msg'=>'修改成功！']);
            }
            else
            {
                return Json::encode(['code'=>1, 'msg'=>'修改失败！']);
            }
        } else {
            if(Yii::$app->request->isGet) {
                $id = Yii::$app->request->get("id");
                return $this->render('update', ['model' => $model]);
            }
            else
            {
                return "参数错误！";
            }
        }
    }

    /**
     * Deletes an existing ProductCategory model.
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
     * Finds the ProductCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
