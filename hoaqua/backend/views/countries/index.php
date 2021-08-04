<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\countriesSE */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thành phố';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-index">

    <h1></h1>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
          </div>
          <div class="panel-body">
          <p class="pull-right">
        <?= Html::a('Thêm thành phố', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
          <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id',
                // 'label'=>' Tên cột'
                'headerOptions'=>
                [
                    'style'=>'width: 30px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 30px; text-align:center;'
                ]
            ],
            [
                'attribute'=>'country',
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
                'attribute'=>'code',
                // 'label'=>' Tên cột'
                'headerOptions'=>
                [
                    'style'=>'width: 50px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 50px; text-align:center;'
                ]
            ],
            [
                'attribute'=>'create_up',
                // 'label'=>' Tên cột'
                'content'=>function($model){
                    return date('d-m-y',$model->create_up);
                },
                'headerOptions'=>
                [
                    'style'=>'width: 150px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 200px; text-align:center;'
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
                        'data-confirm'=>'Bạn có chắc muốn xóa: '. $model->country,
                        'data-method'=>'post'
            ]);
                },
            ],],
        ],
    ]); ?>
          </div>
    </div>
    


</div>
