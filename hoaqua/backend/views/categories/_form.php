<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\CategoryDetailController;
use backend\models\Categories;
use backend\models\CategoryDetail;
use phpDocumentor\Reflection\Types\Array_;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Categories */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(
       
        ArrayHelper::map(Categories::find()->where('prent_id'==0)->all(),'id','title'),
        [
            'prompt'=>'Danh mục cha'
        ]
    )
    ?>
    <?= $form->field($model, 'cate_id')->dropDownList(
        ArrayHelper::map(CategoryDetail::find()->all(),'id','cat_title'),
        [
            'prompt'=>'Chọn danh mục cấp'
        ],
    ) ?>
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
