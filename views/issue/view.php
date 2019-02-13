<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Issue;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="issue-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            [
            'label' => 'Parent Issue',
            'format' => 'raw',
            'value' => function ($model, $key) {
              if($model->parent_id){
                $parent=Issue::findOne($model->parent_id);
                $url = Url::to(['issue/view', 'id' => $parent->id]);

                return Html::a($parent->name, $url);
              }
              else{
                return "None";
              }
            },
            ],
            'name',
            'description:ntext',
            'status',
            'priority',
            'url:url',
        ],
    ]) ?>

</div>
