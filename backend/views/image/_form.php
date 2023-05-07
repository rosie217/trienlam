<?php

use common\models\Image;
use common\models\Title;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Image $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="image-form">
	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'images')->widget(FileInput::classname(), [
		'options'       => [
			'multiple' => true,
			'accept'   => 'image/*',
		],
		'pluginOptions' => [
			'initialPreview'       => array_values(ArrayHelper::map(Image::find()->andWhere(['id' => $model->id])->all(), 'id', 'image_url')),
			'initialPreviewAsData' => true,
			'browseClass'          => 'btn btn-success',
			'uploadClass'          => 'btn btn-info',
			'showRemove'           => true,
			'showUpload'           => false,
			'maxFileSize'          => 2800,
			'maxFileCount'         => 4,
		],
	])->label('Ảnh'); ?>
	<?php echo $form->field($model, 'title_id')->dropDownList(ArrayHelper::map(Title::find()->all(), 'id', 'name'), [
		'id'       => 'title_id',
		'prompt'   => 'Please select',
		'required' => true,
	])->label('Tiêu đề');
	?>
	<div class="form-group">
		<?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>
</div>
