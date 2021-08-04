<?php

use backend\models\Brands;
use backend\models\Categories;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\products */
/* @var $form yii\widgets\ActiveForm */
$data=ArrayHelper::map(Categories::find()->all(), 'id', 'title');
print_r($data);
?>


<div class="products-form">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>
    <?=$form->field($model, 'product_cat')->dropDownList(
    ArrayHelper::map(Categories::find()->all(), 'id', 'title'),
    [
        'prompt' => 'Chọn Danh mục',
    ]
)?>

    <?=$form->field($model, 'product_band')->dropDownList(
    ArrayHelper::map(Brands::find()->all(), 'id', 'brand_title'),
    [
        'prompt' => 'Chọn Nhà cung cấp',
    ]
)?>
    <?=$form->field($model, 'product_title')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'product_price')->textInput()?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?=$form->field($model, 'product_desc')->textarea(['id'=>'text_45555'])?>

    <?=$form->field($model, 'active')->dropDownList(
    [
        1 => 'Kích hoạt',
        0 => 'Không kích hoạt',
    ],
    [
        'prompt' => 'Chọn trạng thái',
    ]
)?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
