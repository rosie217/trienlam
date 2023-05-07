<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Title $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="title-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

	<div class="form-group">
		<?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
