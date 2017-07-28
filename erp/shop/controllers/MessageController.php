<?php

namespace app\erp\shop\controllers;

/**
 * Default controller for the `Index` module
 */
class MessageController extends ShopUser
{
    public function actionIndex()
    {
        $this->layout = "form";
        return $this->render("index");
    }
}