<?php

use backend\models\Brands;
use backend\models\Categories;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\productsSE */
/* @var $dataProvider yii\data\ActiveDataProvider */
 $baseUrl= Yii::$app->homeUrl;
        // $URL=str_replace($baseUrl."/uploads","",$baseUrl);
        $URL=$baseUrl."/uploads";
      
$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title"><?=Html::encode($this->title)?></h3>
          </div>
          <div class="panel-body">
          <p class="pull-right">
        <?=Html::a('Thêm sản phẩm', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'id',
            //  'label'=>' Tên cột',
            'headerOptions' =>
            [
                'style' => 'width: 5px; text-align:center;',
            ],
            'contentOptions' => [
                'style' => 'width: 5px; text-align:center;',
            ],
        ],
        [
            'attribute' => 'product_cat',
            // 'label'=>' Tên cột'
            'content' => function ($model) {
                $Cate = Categories::find()->all();
              
                foreach ($Cate as $key => $value) {
                    iF($model->product_cat == $value['id']){
                        return $model->product_cat = $value['title'];
                    }
                     
                    print_r($model->product_cat);
                }
            },
            'headerOptions' =>
            [
                'style' => 'width: 100px; text-align:center;',
            ],
            'contentOptions' => [
                'style' => 'width: 100px; text-align:center;',
            ],
        ],
        [
            'attribute' => 'product_band',
            // 'label'=>' Tên cột'
            'content' => function ($model) {
                $Cate = Brands::find()->all();
                foreach ($Cate as $key => $value) {
                    if($model->product_band == $value['id']){
                        return $model->product_band = $value['brand_title'];
                    }
                    
                }
            },
            'headerOptions' =>
            [
                'style' => 'width: 100px; text-align:center;',
            ],
            'contentOptions' => [
                'style' => 'width: 100px; text-align:center;',
            ],
        ],
        [
            'attribute' => 'product_title',
            'headerOptions' =>
            [
                'style' => 'width: 150px; text-align:center;',
            ],
            'contentOptions' => [
                'style' => 'width: 150px; text-align:center;',
            ],
        ],
        [
            'attribute' => 'product_price',
            'content' => function ($model) {
                return $model->product_price . ' VND';
            },
            'headerOptions' =>
            [
                'style' => 'width: 100px; text-align:center; ',
            ],
            'contentOptions' => [
                'style' => 'width: 100px; text-align:center;',
            ],
        ],
        [
            'attribute' => 'product_img',
            'headerOptions' =>
            [
                'style' => 'width: 150px; text-align:center; ',
            ],
            'contentOptions' => [
                'style' => 'width: 150px; text-align:center; ',
            ],
        ],
        [
            'attribute' => 'product_desc',

            'headerOptions' =>
            [
                'style' => 'width: 150px; text-align:center; ',
            ],
            'contentOptions' => [
                'style' => 'width: 150px; text-align:center; white-space: nowrap;',
            ],
        ],
        [
            'attribute' => 'product_keywords',
            'headerOptions' =>
            [
                'style' => 'width: 150px; text-align:center; ',
            ],
            'contentOptions' => [
                'style' => 'width: 150px; text-align:center; white-space: nowrap; ',
            ],
        ],
        [
            'attribute' => 'create_up',
            'content' => function ($model) {
                return date('d-m-y', $model->create_up);
            },
            'headerOptions' =>
            [
                'style' => 'width: 150px; text-align:center;',
            ],
            'contentOptions' => [
                'style' => 'width: 150px; text-align:center;',
            ],
        ],
        [
            'attribute' => 'update_up',
            'content' => function ($model) {
                return date('d-m-y', $model->update_up);
            },
            'headerOptions' =>
            [
                'style' => 'width: 150px; text-align:center;',
            ],
            'contentOptions' => [
                'style' => 'width: 150px; text-align:center;',
            ],
        ],
        [
            'attribute' => 'active',
            'content' => function ($model) {
                if ($model->active == 0) {
                    return '<span class="label label-danger"> Không kích hoạt </span>';
                } else {
                    return '<span class="label label-success"> Kích hoạt </span>';
                }
            },
            // 'label'=>' Tên cột'
            'headerOptions' =>
            [
                'style' => 'width: 150px; text-align:center;',
            ],
            'contentOptions' => [
                'style' => 'width: 150px; text-align:center;',
            ],
        ],

        ['class' => 'yii\grid\ActionColumn',
            'buttons' =>
            [
                'view' => function ($url, $model) {
                    return Html::a('View', $url, ['class' => 'btn btn-sx btn-primary']);
                },
                'update' => function ($url, $model) {
                    return Html::a('Edit', $url, ['class' => 'btn btn-sx btn-success']);
                },
                'delete' => function ($url, $model) {
                    return Html::a('Delete', $url, [
                        'class' => 'btn btn-sx btn-danger',
                        'data-confirm' => 'Bạn có chắc muốn xóa: ' . $model->product_title,
                        'data-method' => 'post',
                    ]);
                },
            ]],
    ],
]);?>
          </div>
    </div>



</div>
