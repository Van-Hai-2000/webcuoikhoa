<?php

use backend\models\Banners;
use backend\models\News;
use backend\models\Products;
use yii\db\Expression;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <!-- Start Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
         <?php  
            $bann=Banners::find()->all();
            foreach ($bann as $key => $value) {
                
          ?>
          <div class="carousel-item <?php echo ($value['banner_image']) ? 'active' : '' ?> ">
              <?php ?>
            <img class="d-block w-100" src="images/<?php echo $value["banner_image"]?>" alt="<?php echo $value["banner_title"]?>">
          </div>
         <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <!-- End Slider -->




    <!-- Start Categories  -->
    <?php
$model = Products::find()->limit(3)->all();
?>
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <?php foreach ($model as $key => $value) {
    if ($model) {
        ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/<?php echo $value["product_img"] ?>" alt="<?php echo $value['product_title'] ?>" />
                        <a class="btn hvr-hover" href="#"><?php echo $value['product_title'] ?></a>
                    </div>
                </div>
                  <?php
}
}
?>
            </div>
        </div>
    </div>

    <!-- End Categories -->

	<div class="box-add-products">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/add-img-01.jpg" alt="" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/add-img-02.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php
        $model1 = Products::find()->where(['product_cat' => 1])->orderBy(new Expression('rand()'))->limit(4)->all();
        $model2 = Products::find()->where(['product_cat' => 2])->orderBy(new Expression('rand()'))->limit(4)->all();
        $model3 = Products::find()->where(['product_cat' => 3])->orderBy(new Expression('rand()'))->limit(4)->all();
        $model4 = Products::find()->where(['product_cat' => 4])->orderBy(new Expression('rand()'))->limit(4)->all();
        $j=Yii::$app->homeUrl.'uploads/';
    ?>
    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Hoa quả</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">ALL</button>
                            <button data-filter=".kh_1">Rau</button>
                            <button data-filter=".kh_2">Hoa</button>
                            <button data-filter=".kh_3">Quả</button>
                            <button data-filter=".kh_4">Củ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row special-list">
                <?php
                foreach ($model1 as $key):
                ?>
                <div class="col-lg-3 col-md-6 special-grid <?php echo 'kh_'.'1'; ?>">
               
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="<?php echo $j ?><?php echo $key->product_img ?>" class="img-fluid" alt="<?php echo $key->product_title ?>">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <?php 
                                
                                    echo Html::a('Thêm giỏ hàng',['shopping/addcart','id'  => $key->id ],['class'=>'cart']);
                                ?>
                               
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $key->product_title ?></h4>
                            <h5> <?php echo $key->product_price ?>VND</h5>
                        </div>
                    </div>
                   
                </div>
                <?php endforeach;?>
                <?php foreach ($model2 as $key2):
                ?>
                <div class="col-lg-3 col-md-6 special-grid <?php echo 'kh_'.'2'; ?>">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="<?php echo $j ?><?php echo $key2->product_img ?>" class="img-fluid" alt="<?php echo $key2->product_title ?>">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <?php 
                                
                                    echo Html::a('Thêm giỏ hàng',['shopping/addcart','id'  => $key2->id ],['class'=>'cart']);
                                ?>
                               
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $key2->product_title ?></h4>
                            <h5> <?php echo $key2->product_price ?>VND</h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php foreach ($model3 as $key2):
                ?>
                <div class="col-lg-3 col-md-6 special-grid <?php echo 'kh_'.'3'; ?>">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="<?php echo $j ?><?php echo $key2->product_img ?>" class="img-fluid" alt="<?php echo $key2->product_title ?>">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <?php 
                                
                                    echo Html::a('Thêm giỏ hàng',['shopping/addcart','id'  => $key2->id ],['class'=>'cart']);
                                ?>
                               
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $key2->product_title ?></h4>
                            <h5> <?php echo $key2->product_price ?>VND</h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php foreach ($model4 as $key2):
                ?>
                <div class="col-lg-3 col-md-6 special-grid <?php echo 'kh_'.'4'; ?>">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="<?php echo $j ?><?php echo $key2->product_img ?>" class="img-fluid" alt="<?php echo $key2->product_title ?>">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <?php 
                                
                                    echo Html::a('Thêm giỏ hàng',['shopping/addcart','id'  => $key2->id ],['class'=>'cart']);
                                ?>
                               
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $key2->product_title ?></h4>
                            <h5> <?php echo $key2->product_price ?>VND</h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Bài viết</h1>
                        <p>Những bài viết đc quan tâm</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php   
                $new=News::find()->all();
                if ($new) {
                    foreach ($new as $key => $value) {
                        ?>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/<?php echo $value["new_image"] ?>" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3><?php echo $value["new_title"] ?></h3>
                                <p><?php echo $value["new_desc"] ?></p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </div>
    <!-- End Blog  -->
