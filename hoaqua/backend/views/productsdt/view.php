<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\productdetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pr_code',
            'pr_image1:ntext',
            'pr_image2:ntext',
            'pr_image3:ntext',
            'pr_image4:ntext',
            'pr_desc:ntext',
            'create_up',
            'update_up',
            'active',
        ],
    ]) ?>

</div>
