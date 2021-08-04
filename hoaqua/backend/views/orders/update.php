<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\orders */

$this->title = 'Cập nhật đơn hàng: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-update">
   <div class="panel panel-primary">
         <div class="panel-heading">
               <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
         </div>
         <div class="panel-body">
         <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
         </div>
   </div>
   

</div>
