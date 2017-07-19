<?php

namespace app\erp\index\controllers;

use app\erp\admin\controllers\ConfController;

/**
 * Default controller for the `index` module
 */
class DefaultController extends ConfController
{
    public function actionIndex()
    {
        //var_dump($this->param);
        return $this->render('index');
    }
}
