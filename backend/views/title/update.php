<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Title $model */
$this->title = 'Chỉnh sửa tiêu đề: ' . $model->name;
?>
<div class="title-update">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
