<?php

namespace app\erp\manager\controllers;

use app\erp\admin\controllers\ConfController;

/**
 * Default controller for the `manager` module
 */
class DefaultController extends ConfController
{
    public function actionIndex()
    {
        $this->layout = "main";
        return $this->render("index");
    }
}
