<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Issue;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="issue-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            [
            'label' => 'Parent Issue',
            'format' => 'raw',
            'value' => function ($model, $key) {
              if($model->PARENT_ID){
                $parent=Issue::findOne($model->PARENT_ID);
                $url = Url::to(['issue/view', 'id' => $parent->ID]);

                return Html::a($parent->NAME, $url);
              }
              else{
                return "None";
              }
            },
            ],
            'NAME',
            'DESCRIPTION:ntext',
            'STATUS',
            'PRIORITY',
            'URL:url',
        ],
    ]) ?>

</div>
