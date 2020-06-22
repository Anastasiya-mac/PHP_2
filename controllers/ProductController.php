<?php

namespace app\controllers;
use app\models\Product;

class ProductController extends Controller {

    public function actionIndex() {
        echo "catalog";
    }

    public function actionCart() {
        $id = $_GET['id'];
        $model = Product::getById($id);
        echo $this->renderTemplate('product_cart', ['model'=> $model]);
    }

}