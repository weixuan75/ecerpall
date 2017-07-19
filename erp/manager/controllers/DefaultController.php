<?php

namespace app\erp\manager\controllers;

use app\erp\admin\controllers\UserController;
use yii\web\Controller;

/**
 * Default controller for the `manager` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = false;
        return $this->render("index");
    }
}
