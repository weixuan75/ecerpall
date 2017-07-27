<?php

namespace app\erp\shop\controllers;

/**
 * Default controller for the `Index` module
 */
class DefaultController extends ConfController
{
    public $layout = false;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
