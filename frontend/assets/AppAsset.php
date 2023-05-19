<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

	public $basePath  = '@webroot';

	public $baseUrl   = '@web';

	public $css       = [
		'css/main.css',
		'css/grid.css',
		'css/fontawesome.css',
		'css/default-skin.css',
		'css/font-awesome.min.css',
		'css/kube.css',
		'css/photoswipe.css',
		'css/theme.css',
	];

	public $js        = [
		'js/jquery.min.js',
		'js/main.js',
		'js/jquery.swipebox.js',
		'js/jquery.fullscreen.min.js',
		'js/imagesloaded.pkgd.min.js',
		'js/isotope.pkgd.min.js',
		'js/photoswipe.min.js',
		'js/photoswipe-ui-default.min.js',
		'js/owl.carousel.min.js',
		'js/theme.js',
	];

	public $jsOptions = [
		'position' => View::POS_HEAD,
	];

	public $depends   = [
		'yii\web\YiiAsset',
		'yii\bootstrap5\BootstrapAsset',
	];
}
