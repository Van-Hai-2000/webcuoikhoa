<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_title')->textInput() ?>

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
