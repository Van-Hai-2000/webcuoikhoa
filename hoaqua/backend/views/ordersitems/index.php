<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ordersitemsSE */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Các đơn đặt hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordersitems-index">

    <h1><?= Html::encode($this->title) ?></h1>

  

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'id',
            'order_id',
            'product',
            'price',
            'qty',
            //'active',
            //'create_up',
            //'update_up',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
