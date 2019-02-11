<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\IssueSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IssueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="issue-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
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
