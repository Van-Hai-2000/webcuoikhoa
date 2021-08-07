
<?php

use yii\helpers\Html;
use yii\web\Request;
use yii\web\Session;
$this->title = 'Cart';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-cart">
    <h1><?=Html::encode($this->title)?></h1>
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Giỏ hàng</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$request = Yii::$app->request;
foreach ($infoCart as $key => $value) {?>
                                <tr>
                                    <td class="thumbnail-img">
                                            <?php echo $value["id"]; ?>
                                    </td>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="<?php echo Yii::$app->homeUrl . 'uploads/' . $value["product_img"] ?>" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									<?php echo $value["product_title"] ?>
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p><?php echo $value["product_price"] ?> VND</p>
                                    </td>
                                    <td class="quantity-box">
                                        <input type="number" name="amount" size="4"  value="<?php echo $value["amount"] ?>" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p><?php echo number_format($value["amount"] * $value["product_price"]) ?></p>
                                    </td>
                                    <td class="remove-pr">
                                    <?php
                                        echo Html::a('<i class="fas fa-times"></i>', ['shopping/delcart', 'id' => $value["id"]]);
                                        $qty = $request->get('amount');
                                        echo $qty;
                                        echo Html::a('Cập nhật', ['shopping/update', 'id' => $value["id"], 'amount' => $qty]);
    ?>
								</a>
                                </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">

                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
</div>