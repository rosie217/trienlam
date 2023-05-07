<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Banner $model */

$this->title = 'Thêm mới banner';
$this->params['breadcrumbs'][] = ['label' => 'Thêm mới banner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
