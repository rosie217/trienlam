<?php

use common\models\Banner;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title                   = 'Quản lý banner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
	<div class="card-body pb-0">
		<div class="banner-index">
			<p>
				<?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
			</p>

			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'columns'      => [
					['class' => 'yii\grid\SerialColumn'],
					[
						'format'    => 'html',
						'label'     => 'Ảnh',
						'value'     => function(Banner $data) {
							return Html::img($data->image_url, ['height' => '100px']);
						},
					],
					[
						'class'      => ActionColumn::className(),
						'template'   => '{delete}',
						'urlCreator' => function($action, Banner $model, $key, $index, $column) {
							return Url::toRoute([
								$action,
								'id' => $model->id,
							]);
						},
					],
				],
			]); ?>

		</div>
	</div>
</div>
