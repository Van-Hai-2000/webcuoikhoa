<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\productdetailSE */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Productdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pr_code',
            'pr_image1:ntext',
            'pr_image2:ntext',
            'pr_image3:ntext',
            //'pr_image4:ntext',
            //'pr_desc:ntext',
            //'create_up',
            //'update_up',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
