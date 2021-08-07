<?php 
namespace frontend\common;
use yii;
use yii\web\Session;
 use backend\models\Products;

class Cart {
    public function addCart($id,$arrData)
    { 
        $session = Yii::$app->session;
        //Nếu k tồn tại sesscart
        if(!isset($session['cart']))
        {
            $cart[$id]=array(
                "id" => $arrData["id"],
                "product_title" => $arrData["product_title"],
                "product_price" => $arrData["product_price"],
                "product_img" => $arrData["product_img"],
                "amount" =>1,             
            );
        }
        else
        {
            $cart=$session['cart'];
            if(array_key_exists($id,$cart)){
                $cart[$id]=array(
                        "id" => $arrData["id"],
                        "product_title"=> $arrData["product_title"],
                        "product_price"=> $arrData["product_price"],
                        "product_img"=> $arrData["product_img"],
                        "amount"=>$cart[$id]["amount"]+1,
                );
            }
            else
            {
                $cart[$id]=array(
                    "id" => $arrData["id"],
                    "product_title"=> $arrData["product_title"],
                    "product_price"=> $arrData["product_price"],
                    "product_img"=> $arrData["product_img"],
                    "amount"=>1,
            );
            }
        }
        $session['cart']=$cart;
     }
     public function actionAddcart($id)
    {
        $pro_info = new Products();
        $pro_info = $pro_info->getproid($id);
        $cart = new Cart();
        $cart = $cart->addCart($id, $pro_info);
        $session = Yii::$app->session;
        $infoCart = $session['cart'];
        $totalAmount=$total=0;
        foreach ($infoCart as $key => $value) {
           $totalAmount+=$value["amount"];
           $total+=$value["product_price"]*$value["amount"];
        }
    }
    public function delitemcart($id){
        $session =yii::$app->session;
        if(isset($session["cart"])){
            $cart=$session["cart"];
            unset($cart[$id]);
            $session['cart']=$cart;
        }   
    }
    public function updatecart($id,$amount){
        $session =yii::$app->session;
        if(isset($session["cart"])){
            $cart=$session["cart"];
            $cart[$id]['amount']=$amount;
            $session['cart']=$cart;
        }   
        

    }
        
  }
?>