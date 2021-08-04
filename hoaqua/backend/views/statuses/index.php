<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\statusesSE */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trạng thái';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statuses-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title"><?=Html::encode($this->title)?></h3>
          </div>
          <div class="panel-body">
          <p class="pull-right">
        <?=Html::a('Thêm trạng thái', ['create'], ['class' => 'btn btn-success'])?>
    </p>
          <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute'=>'id',
            // 'label'=>' Tên cột'
            'headerOptions'=>
            [
                'style'=>'width: 10px; text-align:center;'
            ],
            'contentOptions'=>[
                'style'=>'width: 10px; text-align:center;'
            ]
        ],
        [
            'attribute'=>'name',
            // 'label'=>' Tên cột'
            'headerOptions'=>
            [
                'style'=>'width: 200px; text-align:center;'
            ],
            'contentOptions'=>[
                'style'=>'width: 200px; text-align:center;'
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

        ['class' => 'yii\grid\ActionColumn',
        'buttons'=>
        [
            'view'=>function($url,$model){
                return Html::a('View', $url, ['class'=>'btn btn-sx btn-primary']);
            },
            'update'=>function($url,$model){
                return Html::a('Edit', $url, ['class'=>'btn btn-sx btn-success']);
            },
            'delete'=>function($url,$model){
                return Html::a('Delete', $url, [
                    'class'=>'btn btn-sx btn-danger',
                    'data-confirm'=>'Bạn có chắc muốn xóa: '. $model->name,
                    'data-method'=>'post'
        ]);
            },
        ],],
    ],
]);?>
          </div>
    </div>



</div>
