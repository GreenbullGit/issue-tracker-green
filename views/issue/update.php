<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */

$this->title = 'Update Issue: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="issue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parentData' => $parentData,
    ]) ?>

</div>
