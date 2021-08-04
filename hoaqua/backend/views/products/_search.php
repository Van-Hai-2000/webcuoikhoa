<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\productsSE */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_cat') ?>

    <?= $form->field($model, 'product_band') ?>

    <?= $form->field($model, 'product_title') ?>

    <?= $form->field($model, 'product_price') ?>

    <?php // echo $form->field($model, 'product_desc') ?>

    <?php // echo $form->field($model, 'product_keywords') ?>

    <?php // echo $form->field($model, 'create_up') ?>

    <?php // echo $form->field($model, 'update_up') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
