<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Issue;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Issue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-form">

    <?php $form = ActiveForm::begin();
    //echo implode(" ", $parentData);
     ?>

    <?= $form->field($model, 'PARENT_ID')->dropdownList($parentData) ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPTION')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'STATUS')->dropdownList([
        "New" => 'New',
        "In progress" => 'In progress',
        "Waiting for response" => 'Waiting for response',
        "Solved" => 'Solved',
        "Closed" => 'Closed',
    ],
    ) ?>

    <?= $form->field($model, 'PRIORITY')->dropdownList([
        "Very low" => 'Very low',
        "Low" => 'Low',
        "Normal" => 'Normal',
        "High" => 'High',
        "Very High" => 'Very High',
        "Urgent" => 'Urgent',
    ],
    ) ?>

    <?= $form->field($model, 'URL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
