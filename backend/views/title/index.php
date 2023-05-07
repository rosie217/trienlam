<?php

use common\models\Title;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\TitleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title                   = 'Quản lý tiêu đề';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
	<div class="card-body pb-0">
		<div class="title-index">
			<p>
				<?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
			</p>

			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel'  => $searchModel,
				'columns'      => [
					['class' => 'yii\grid\SerialColumn'],
					'name:ntext',
					[
						'class'      => ActionColumn::className(),
						'template'   => '{update} {delete}',
						'urlCreator' => function($action, Title $model, $key, $index, $column) {
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
