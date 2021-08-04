<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\productdetailSE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pr_code') ?>

    <?= $form->field($model, 'pr_image1') ?>

    <?= $form->field($model, 'pr_image2') ?>

    <?= $form->field($model, 'pr_image3') ?>

    <?php // echo $form->field($model, 'pr_image4') ?>

    <?php // echo $form->field($model, 'pr_desc') ?>

    <?php // echo $form->field($model, 'create_up') ?>

    <?php // echo $form->field($model, 'update_up') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
