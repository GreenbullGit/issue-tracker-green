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

    <?= $form->field($model, 'parent_id')->dropdownList($parentData) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropdownList([
        "New" => 'New',
        "In progress" => 'In progress',
        "Waiting for response" => 'Waiting for response',
        "Solved" => 'Solved',
        "Closed" => 'Closed',
    ],
    ) ?>

    <?= $form->field($model, 'priority')->dropdownList([
        "Very low" => 'Very low',
        "Low" => 'Low',
        "Normal" => 'Normal',
        "High" => 'High',
        "Very High" => 'Very High',
        "Urgent" => 'Urgent',
    ],
    ) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
