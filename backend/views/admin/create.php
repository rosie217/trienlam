<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Admin $model */
$this->title                   = 'Thêm mới tài khoản';
$this->params['breadcrumbs'][] = [
	'label' => 'Admins',
	'url'   => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
