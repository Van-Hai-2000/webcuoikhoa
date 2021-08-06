<?php
use backend\models\Products;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\Session;
AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<?php $this->beginBody()?>
<?php $j = Yii::$app->homeUrl . 'uploads/';

?>
<?php
$url = Yii::$app->homeUrl . 'site';
$baseurl = str_replace('site', '', $url);
?>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php echo Html::a('<img src="images/logo.png" class="logo" alt="">', ['/'], $options = ['class' => 'navbar-brand']) ?>

                </div>
                <!-- End Header Navigation -->


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><li><?php echo html::a('Trang chủ', ['/']); ?></li></li>
                        <li class="nav-item"><?php echo html::a('VỀ CHÚNG TÔI', ['/site/about']); ?></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><?php echo html::a('Shop', ['site/shop']); ?></li>
								<li><?php echo html::a('Chi tiết sản phẩm', ['site/shopmore']); ?></li>
                                <li><?php echo html::a('Giỏ hàng', ['site/cart']); ?></li>
                                <li><?php echo html::a('Thanh toán', ['site/checkout']); ?></li>
                                <li><?php echo html::a('Tài khoản', ['shopping']); ?></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                        <li class="nav-item"><?php echo html::a('Liên hệ', ['site/contact']); ?></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                 <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge" id="totalamount">
                                <?php
                                    if(isset($session['cart'])) {
                                            $infoCart[] = array(
                                            "product_title" => "",
                                            "product_price" => "",
                                            "product_img" => "",
                                            "amount" => 1);
                                            $totalAmount = $total = 0;
                                    } 
                                    else {
                                        $session = Yii::$app->session;
                                        $infoCart = $session['cart'];
                                        $totalAmount = $total = 0;
                                        foreach ($infoCart as $key => $value) {
                                            $totalAmount += $value["amount"];
                                            $total += $value["product_price"] * $value["amount"];
                                        }

                                    }

                                    echo $totalAmount;
                                    ?>
                                </span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php print_r($infoCart);
                        foreach ($infoCart as $key => $value) {?>
                        <li>
                            <a href="#" class="photo"><img src="<?php echo $j . $value["product_img"] ?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo $value["product_title"] ?> </a></h6>
                            <p><?php echo $value["amount"] ?>x - <span class="price"><?php echo $value["product_price"] ?> VND</span></p>
                        </li>
                        <?php }?>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Tổng</strong>: <?php echo $total; ?> VND</span>
                        </li>
                    </ul>
                </li>
            </div>
        </nav>
    </header>

    <?=$content?>

    <?php
    $h = Products::find()->all();
    print_r($session['cart']);
    ?>
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
        <?php 
            foreach ($h as $key2 => $value2) {
            if ($value2) {
        ?>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo $j ?><?php echo $value2["product_img"] ?>" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <?php }?>
                <?php }?>
        </div>
    </div>
    <!-- End Instagram Feed  -->



    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address:234 Hoang Quoc Viet </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a>0388 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a >duongquang@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->
    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2021 <a href="#">FreshShop</a> Design By :DuongQuang
    </div>
    <!-- End copyright  -->
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
