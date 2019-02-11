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
              $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $parentId=$model->ID);

              return $this->render('subissue', [
                  'dataProvider' => $dataProvider,
              ]);
            },
            'disabled' => function ($model, $key, $index){
              if(Issue::find()->where(['PARENT_ID' => $model->ID])->count()>0){
                return False;
              }
              else{
                return True;
              }
            }
            ],
            'ID',
            //'PARENT_ID',
            'NAME',
            'DESCRIPTION:ntext',
            'STATUS',
            'PRIORITY',
            'URL:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
