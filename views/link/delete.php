<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LinkDeleteForm */

$this->title = 'Delete Link ' . $model->link->url;
$this->params['breadcrumbs'][] = ['label' => 'Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-delete">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="link-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->errorSummary($model) ?>

        <div class="form-group">
            <?= Html::submitButton('Confirm delete', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
