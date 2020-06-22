<?php
namespace app\controllers;
use app\models\Cart;

class CartController extends Controller {

    public function actionIndex() {
        echo "cart";
    }

    public function actionViews() {
        $id = $_GET['id'];
        $model = Cart::getById($id);
        echo $this->renderTemplate('cart_views', ['model'=> $model]);
    }
    
    public function actionDelete() {
        $id = $_GET['id'];
        $model = Cart::getById($id);
        $model->delete();
    }

}