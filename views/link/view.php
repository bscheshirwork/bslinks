<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Link */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="link-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
//            'id',
            'date',
            'favicon' => [
                'attribute' => 'favicon',
                'format' => 'raw',
                'value' => $model->favicon ? Html::img('data:image/ico;charset=utf-8;base64,' . base64_encode($model->favicon)) : ''
            ],
            'url:url',
            'title:ntext',
            'metaDescription:ntext',
            'metaKeywords:ntext',
        ],
    ]) ?>

</div>
