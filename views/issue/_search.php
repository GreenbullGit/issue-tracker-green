<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IssueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PARENT_ID') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'DESCRIPTION') ?>

    <?= $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'PRIORITY') ?>

    <?php // echo $form->field($model, 'URL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
