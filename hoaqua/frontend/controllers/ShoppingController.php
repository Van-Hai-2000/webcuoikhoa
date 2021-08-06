<?php
namespace frontend\controllers;

use frontend\common\cart;
use yii;
use yii\web\Session;

class ShoppingController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $cart = new cart();
        $cart = $cart->actionAddcart($id);
        $session = Yii::$app->session;
        $infoCart = $session['cart'];

        return $this->render('index', ['infoCart' => $infoCart]);
    }
   
}
