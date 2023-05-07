<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

	public $basePath  = '@webroot';

	public $baseUrl   = '@web';

	public $css       = [
		'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
		'css/site.css',
		'css/custom.css',
		'css/color.css',
	];

	public $js        = [];

	public $depends   = [
		'dmstr\adminlte\web\AdminLteAsset',
		'dmstr\adminlte\web\FontAwesomeAsset',
		'yii\web\YiiAsset',
		'yii\bootstrap4\BootstrapAsset',
	];

	public $jsOptions = [
		'position' => View::POS_HEAD,
	];
}
