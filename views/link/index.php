<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Links';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],

    'date' => [
        'attribute' => 'date',
        'filter' => false,
    ],
    'favicon' => [
        'attribute' => 'favicon',
        'filter' => false,
        'enableSorting' => false,
        'format' => 'raw',
        'content' => fn($model) => $model->favicon ? Html::img('data:image/ico;charset=utf-8;base64,' . base64_encode($model->favicon)) : '',
    ],
    'url' => [
        'attribute' => 'url',
        'filter' => false,
    ],
    'title' => [
        'attribute' => 'title',
        'filter' => false,
        'format' => 'raw',
    ],

    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{view} {delete}',
    ],
];
?>
<div class="link-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Link', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]); ?>

    <?php Pjax::begin(); ?>

    <?= GridView::widget(['dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,]); ?>

    <?php Pjax::end(); ?>

</div>
