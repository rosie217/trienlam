<?php
/** @var View $this */

/** @var string $directoryAsset */

use dmstr\adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\web\View;

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<?= Html::a('<img class="brand-image img-circle elevation-3" src="' . ($directoryAsset . '/img/AdminLTELogo.png') . '" alt="APP"><span class="brand-text font-weight-light">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'brand-link']) ?>
	<div class="sidebar">

		<nav class="mt-2">
			<?= Menu::widget([
				'options' => [
					'class'       => 'nav nav-pills nav-sidebar flex-column',
					'data-widget' => 'treeview',
				],
				'items'   => [
					[
						'label'  => 'Dashboard',
						'header' => true,
					],
					[
						'icon'  => 'users',
						'label' => 'Quản lý tài khoản',
						'url'   => ['admin/index'],
						'visible'  =>Yii::$app->user->id==1,
					],
					[
						'icon'  => 'list',
						'label' => 'Quản lý menu',
						'url'   => ['title/index'],
						'visible'  =>Yii::$app->user->id==1,
					],
					[
						'icon'  => 'sliders-h',
						'label' => 'Quản lý hình ảnh',
						'url'   => ['image/index'],
					],
					[
						'icon'  => 'sliders-h',
						'label' => 'Quản lý banner',
						'url'   => ['banner/index'],
						'visible'  =>Yii::$app->user->id==1,
					],
				],
			]) ?>
		</nav>

	</div>

</aside>
