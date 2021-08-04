<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BrandsSE */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhà cung cấp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brands-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="panel-body">
            <p class="pull-right">
                <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
            </p>
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => 
        [
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
                'attribute'=>'brand_title',
                // 'label'=>' Tên cột'
                'headerOptions'=>
                [
                    'style'=>'width: 60px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 60px; text-align:center;'
                ]
            ],
            [
                'attribute'=>'brand_mobile',
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
                'attribute'=>'brand_address1',
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
                'attribute'=>'brand_email',
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
                'attribute'=>'brand_image',
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
                'attribute'=>'create_up',
                'content'=>function($model){
                    if($model->create_up==0)
                    {
                        return date(0-0-0,$model->create_up);
                    }
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
                // 'label'=>' Tên cột'
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
                    'style'=>'width: 100px; text-align:center;'
                ],
                'contentOptions'=>[
                    'style'=>'width: 100px; text-align:center;'
                ]
            ],
            
            
           
           
            //'active',

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
                            'data-confirm'=>'Bạn có chắc muốn xóa'.$model->brand_title,
                            'data-method'=>'post'
                ]);
                    },
                ],
            ],
        ],
    ]); 
    ?>
        </div>
    </div>


</div>