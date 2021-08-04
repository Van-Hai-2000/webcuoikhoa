<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\productdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pr_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pr_image1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pr_image2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pr_image3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pr_image4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pr_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_up')->textInput() ?>

    <?= $form->field($model, 'update_up')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
