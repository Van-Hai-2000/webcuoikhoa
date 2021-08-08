<?php
namespace frontend\controllers;

use backend\models\Products;
use frontend\common\cart;
use yii;
use yii\web\Session;

class ShoppingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $cart = new cart(); 
        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        return $this->render('index', ['infoCart' => $infoCart]);
        
    }
     public function actionAddcart($id)
    {
        $cart = new cart();
        $cart = $cart->actionAddcart($id);
        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        return $this->redirect('index');
    }
    public function actionDelcart($id){
      
        $cart = new cart();
        $cart=$cart->delitemcart($id);
        return $this->redirect('index');
    }
    public function actionUpdate($id,$amount)
    {
        $cart = new cart();
        $cart=$cart->updatecart($id,$amount);
        return $this->render('cart',['cart'=>$cart]);
    }
    public function actionCheckout($id)
    {
        $cart = new cart(); 
        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        return $this->render('checkout',['infoCart' => $infoCart]);
    }
}
