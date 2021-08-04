<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Brands */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brands-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'brand_title')->textInput(['maxlength'=> true]) ?>

    <?= $form->field($model, 'brand_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'active')->dropDownList(
        [
            1=>'Kích hoạt',
            0=>'Không kích hoạt'
        ],
        [
            'prompt'=>'Chọn trạng thái'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
