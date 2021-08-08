
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
                                    $sub_total=$discount=$totalt1=$total=0;
                                foreach ($infoCart as $key => $value) {
                                    $sub_total += $value["amount"] * $value["product_price"];
                                    $discount = ($sub_total * 10) / 100;
                                    $totalt1 += ($value["amount"] * $value["product_price"]) - $discount;
                                    $total = $totalt1 + 30000;
                                    ?>
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
                                        <input type="number" id="amount_<?php echo $key ?>" name="amount_<?php echo $key ?>" size="4"  value="<?php echo $value["amount"] ?>" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p><?php echo number_format($value["amount"] * $value["product_price"]) ?></p>
                                    </td>
                                    <td class="remove-pr">
                                    <?php
echo Html::a('<i class="fas fa-times"></i>', ['shopping/delcart', 'id' => $value["id"]]);
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
                        <h3>Giỏ hàng</h3>
                        <div class="d-flex">
                            <h4>Tạm tính</h4>
                            <div class="ml-auto font-weight-bold"> <?php echo number_format($sub_total) ?>  VND </div>
                        </div>
                        <div class="d-flex">
                            <h4>Giảm giá</h4>
                            <div class="ml-auto font-weight-bold"> <?php echo '10%' ?> </div>
                        </div>
                        <hr class="my-1">

                        <div class="d-flex">
                            <h4>Giá giảm sau khi giảm</h4>
                            <div class="ml-auto font-weight-bold"><?php echo $totalt1 ?> </div>
                        </div>
                        <div class="d-flex">
                            <h4>Phí giao hàng</h4>
                            <div class="ml-auto font-weight-bold"><?php echo '30.000' ?>VND  </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Tổng tiền</h5>
                            <div class="ml-auto h5"> <?php echo $total ?>  </div>
                        </div>
                        <hr> </div>
                </div>

                <div class="col-12 d-flex shopping-box"><a href="checkout?id=2" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
</div>