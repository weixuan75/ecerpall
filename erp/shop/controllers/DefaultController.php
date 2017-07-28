<?php

namespace app\erp\shop\controllers;

/**
 * Default controller for the `Index` module
 */
class DefaultController extends ShopUser
{
    public $layout = false;
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "main";
        return $this->render('index');
    }
}
