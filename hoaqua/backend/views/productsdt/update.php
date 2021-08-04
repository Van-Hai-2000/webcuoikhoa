<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\productdetail */

$this->title = 'Update Productdetail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
