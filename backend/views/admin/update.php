<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Admin $model */
$this->title                   = 'Chỉnh sửa tài khoản: ' . $model->username;
?>
<div class="admin-update">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
