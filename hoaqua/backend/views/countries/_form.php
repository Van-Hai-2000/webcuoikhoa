<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\countries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="countries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country')->textarea(['rows' => 6]) ?>

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
