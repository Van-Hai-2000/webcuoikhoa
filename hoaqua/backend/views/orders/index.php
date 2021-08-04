<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ordersSE */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn đặt hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
   <div class="panel panel-primary">
         <div class="panel-heading">
               <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
         </div>
         <div class="panel-body">
         <!-- <p>
        <!-- <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?> 
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'vat_rate',
            'vat',
            'subtotal',
            'total',
            'status',
            'date',
            'description:ntext',
            [
                'attribute'=>'create_up',
                'content'=>function($model){
                    return date('d-m-y',$model->create_up);
                },
                'headerOptions'=>
                [
                    'style'=>'width: 150px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 150px; text-align:center;'
                ]
            ],
            [
                'attribute'=>'update_up',
                'content'=>function($model){
                    return date('d-m-y',$model->update_up);
                },
                'headerOptions'=>
                [
                    'style'=>'width: 150px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 150px; text-align:center;'
                ]
            ],
            [
                'attribute'=>'active',
                'content'=>function($model){
                    if($model->active==0)
                    {
                        return '<span class="label label-danger"> Không kích hoạt </span>';
                    }
                    else{
                        return '<span class="label label-success"> Kích hoạt </span>';
                    }
                },
                // 'label'=>' Tên cột'
                'headerOptions'=>
                [
                    'style'=>'width: 150px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 150px; text-align:center;'
                ]
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

         </div>
   </div>
   

</div>
