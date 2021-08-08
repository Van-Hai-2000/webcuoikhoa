<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\news */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'new_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'new_desc')->textarea(['id'=>'newss']) ?>

    <?= $form->field($model, 'create_up')->textInput() ?>

    <?= $form->field($model, 'update_up')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
