<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Links';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Link', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
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
//            'url:url',
//            'title:ntext',
            //'metaDescription:ntext',
            //'metaKeywords:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
