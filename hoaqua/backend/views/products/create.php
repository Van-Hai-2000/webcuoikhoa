<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\products */

$this->title = 'Thêm danh mục';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">
   <div class="panel panel-primary">
         <div class="panel-heading">
               <h3 class="panel-title"><?=Html::encode($this->title)?></h3>
         </div>
         <div class="panel-body">
         <?=$this->render('_form', ['model' => $model])?>
         </div>
   </div>


</div>
