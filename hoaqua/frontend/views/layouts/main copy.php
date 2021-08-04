<?php

use backend\models\Categories;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    
</head>
<body>
<?php $this->beginBody() ?>

<div class="home_menu">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <div class="logo">
                    <a href=""><img src="images/sp1.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-11">
                        <ul class="menu_item">
                            <li class="item"><a href="">Trang chủ</a></li>
                            <li class="item"><a href="">Giới thiệu</a></li>
                            <li class="item"><a href="">Sản phẩm</a>
                                <ul class="menu_item_1 menu_item">
                                    <?php 
                                    $cate=new Categories();
                                    $cate1= $cate->getcate_cate(0);
                                    foreach ($cate1 as $key => $value) { 
                                        
                                    ?>
                                    <li class="item_1 item"><a href=""><?php echo $value["title"] ?></a>
                                        <ul class="menu_item_2 menu_item">
                                            <?php 
                                                $cate2= $cate->getcate_cate($value['id']);
                                                foreach ($cate2 as $key1 => $value1) {
                                                    if($cate2){
                                                    ?>
                                            <li class="item_2 item_1 item"><a href=""><?php echo $value1["title"] ?></a></li>
                                            <?php
                                               } }?>
                                            
                                        </ul>
                                    </li>
                                    
                                    <?php
                                    }?>
                                </ul>
                            </li>
                            <li class="item"><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-md-1">
                        <div class="elv">
                            <a href="" class="active">EN</a>
                            <a href="">VN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
