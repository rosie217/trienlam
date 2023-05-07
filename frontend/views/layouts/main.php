<?php
/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>" class="h-100">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php $this->registerCsrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
		<link rel="manifest" href="/images/site.webmanifest">
		<link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body class="aurel_drag_protection">
	<?php $this->beginBody() ?>
	<div class="aurel_site_wrapper static_header_footer fadeOnLoad">
		<?= $content ?>
	</div>

	<footer class="aurel_footer aurel_border_on">
	</footer>

	<div class="aurel_preloader_wrapper">
		<div class="aurel_preloader_content">
			<div class="aurel_preloader_bar"></div>
			<h6 class="aurel_preloader_text">LOADING</h6>
		</div>
	</div>
	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage();
