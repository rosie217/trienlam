<?php

use common\models\Banner;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Banner $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="banner-form">

	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'image_url')->widget(FileInput::classname(), [
		'options'       => [
			'multiple' => true,
			'accept'   => 'image/*',
		],
		'pluginOptions' => [
			'initialPreview'       => array_values(ArrayHelper::map(Banner::find()->andWhere(['id' => $model->id])->all(), 'id', 'image_url')),
			'initialPreviewAsData' => true,
			'browseClass'          => 'btn btn-success',
			'uploadClass'          => 'btn btn-info',
			'showRemove'           => true,
			'showUpload'           => false,
			'maxFileSize'          => 2800,
			'maxFileCount'         => 1,
		],
	])->label('Ảnh'); ?>

	<div class="form-group">
		<?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
	</div>
	<?php ActiveForm::end(); ?>

</div>
