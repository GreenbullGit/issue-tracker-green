<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\IssueSearch;
use app\models\Issue;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IssueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Issues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Issue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            ['class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index) {
              return GridView::ROW_COLLAPSED;
            },
            'detail' => function($model, $key, $index, $column){
              $searchModel = new IssueSearch();
              $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $parentId=$model->id);

              return $this->render('subissue', [
                  'dataProvider' => $dataProvider,
              ]);
            },
            'disabled' => function ($model, $key, $index){
              if(Issue::find()->where(['parent_id' => $model->id])->count()>0){
                return False;
              }
              else{
                return True;
              }
            }
            ],
            'id',
            //'parent_id',
            'name',
            'description:ntext',
            'status',
            'priority',
            'url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
