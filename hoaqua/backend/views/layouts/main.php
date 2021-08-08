<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap bg-info">
        <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 admin-left bg-info">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <?php 
                                $route=Yii::$app->controller->route;
                                //$route=explode('/',$route)
                                $control=Yii::$app->controller->id;
                                //echo $control
                           ?>
                            <ul class="list-group">
                                <?php echo Html::a('Trang chủ', ['/'],['class'=>($control=='/') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Nhà cung cấp', ['/brands'],['class'=>($control=='brands') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Danh mục', ['/categories'],['class'=>($control=='categories') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Danh mục cấp', ['/category-detail'],['class'=>($control=='category-detail') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Thành phố', ['/countries'],['class'=>($control=='countries') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Trạng thái', ['/statuses'],['class'=>($control=='statuses') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Đơn đặt hàng', ['/orders'],['class'=>($control=='orders') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Các mặt hàng đã đặt', ['/ordersitems'],['class'=>($control=='ordersitems') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Sản phẩm', ['/products'],['class'=>($control=='products') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Quản lý file', ['/file'],['class'=>($control=='file') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Banner', ['/banner'],['class'=>($control=='file') ? 'list-group-item active' : 'list-group-item' ])?>
                                <?php echo Html::a('Tin Tức', ['/news'],['class'=>($control=='file') ? 'list-group-item active' : 'list-group-item' ])?>
                            </ul>

                        </div>
                    </div>

                </div>
                <div class="col-md-10 admin-right">
                    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy;
                <?= Html::encode(Yii::$app->name) ?>
                <?= date('Y') ?>
            </p>

            <p class="pull-right">
                <?= Yii::powered() ?>
            </p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>