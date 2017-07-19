<?php

namespace app\erp\index\controllers;

use app\erp\admin\controllers\ConfController;

/**
 * Default controller for the `index` module
 */
class DefaultController extends ConfController
{
//    public $layout =false;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //var_dump($this->param);
        return $this->render('index', ["param"=>$this->param]);
    }
}
