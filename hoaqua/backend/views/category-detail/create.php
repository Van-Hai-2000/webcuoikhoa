<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryDetail */

$this->title = 'Create Category Detail';
$this->params['breadcrumbs'][] = ['label' => 'Category Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-detail-create">
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
