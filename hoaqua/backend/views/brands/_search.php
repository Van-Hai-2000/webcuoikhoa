<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BrandsSE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brands-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand_title') ?>

    <?= $form->field($model, 'brand_mobile') ?>

    <?= $form->field($model, 'brand_address1') ?>

    <?= $form->field($model, 'brand_email') ?>

    <?php // echo $form->field($model, 'brand_image') ?>

    <?php // echo $form->field($model, 'create_up') ?>

    <?php // echo $form->field($model, 'update_up') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
