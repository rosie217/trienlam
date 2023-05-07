<?php
/** @var \yii\web\View $this */

/** @var string $directoryAsset */

use yii\helpers\Html;

?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
				<span class="d-none d-md-inline"><?php echo Yii::$app->user->identity['username']; ?></span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<li class="user-footer">
					<?= Html::a('Sign out', ['/site/logout'], [
						'data-method' => 'post',
						'class'       => 'btn btn-default btn-flat float-right',
					]) ?>
				</li>
			</ul>
		</li>
	</ul>
</nav>
