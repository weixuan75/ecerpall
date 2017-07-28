<?php

namespace app\erp\index\controllers;

use yii\web\Controller;

/**
 * Default controller for the `index` module
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->layout = false;
        return $this->render('index');
    }
}
