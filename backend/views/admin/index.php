<?php

use common\models\Admin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\AdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title                   = 'Quản lý tài khoản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<div class="card-tools">
			<?= Html::a('Thêm mới tài khoản', ['create'], ['class' => 'btn btn-success']) ?>
		</div>
	</div>
	<div class="card-body pb-0">
		<div class="tag-index">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel'  => $searchModel,
				'columns'      => [
					['class' => 'yii\grid\SerialColumn'],
					'username',
					[
						'attribute' => 'status',
						'format'    => 'html',
						'filter'    => Admin::STATUS,
						'value'     => function(Admin $data) {
							return Html::tag('p', Admin::STATUS[$data->status], ['class' => 'badge badge-' . ($data->status == Admin::STATUS_ACTIVE ? 'success' : 'danger')]);
						},
					],
					[
						'attribute' => 'super_admin',
						'format'    => 'html',
						'filter'    => Admin::SUPERADMIN,
						'value'     => function(Admin $data) {
							return Html::tag('p', Admin::SUPERADMIN[$data->super_admin], ['class' => 'badge badge-' . ($data->super_admin == Admin::SUPERADMIN_ACTIVE ? 'success' : 'danger')]);
						},
					],
					[
						'class'      => ActionColumn::className(),
						'template'   => '{update}{delete}',
						'urlCreator' => function($action, Admin $model, $key, $index, $column) {
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
