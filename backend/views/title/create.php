<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Title $model */
$this->title = 'Thêm mới tiêu đề';
?>
<div class="title-create">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
