<?php

use common\models\Image;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ImageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title                   = 'Ảnh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
	<div class="card-body pb-0">
		<div class="image-index">
			<p>
				<?= Html::a('Thêm mới ảnh', ['create'], ['class' => 'btn btn-success']) ?>
			</p>

			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel'  => $searchModel,
				'columns'      => [
					['class' => 'yii\grid\SerialColumn'],
					[
						'format'    => 'html',
						'label'     => 'Ảnh',
						'value'     => function(Image $data) {
							return Html::img($data->image_url, ['width' => '100px']);
						},
					],
					[
						'attribute' => 'title_name',
						'options'    => ['width' => '80px'],
						'label'     => 'Tên tiêu đề',
						'value'     => function(Image $data) {
							return $data->title_id != null ? $data->title->name : 'Không có';
						},
					],
					[
						'class'      => ActionColumn::className(),
						'template'   => '{delete}',
						'urlCreator' => function($action, Image $model, $key, $index, $column) {
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

