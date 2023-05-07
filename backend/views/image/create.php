<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Image $model */
$this->title = 'Thêm mới ảnh';
?>
<div class="image-create">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
