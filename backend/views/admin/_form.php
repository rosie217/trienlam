<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Admin;
/** @var yii\web\View $this */
/** @var common\models\Admin $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="admin-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'password_hash')->textInput(['maxlength' => true,'value' => '******']) ?>

	<?= $form->field($model, 'status')->dropDownList(Admin::STATUS) ?>

	<?= $form->field($model, 'super_admin')->dropDownList(Admin::SUPERADMIN) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
