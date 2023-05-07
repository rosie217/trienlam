<?php

use yii\web\UrlManager;

$params = array_merge(require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php');
return [
	'id'                  => 'app-backend',
	'name'                => 'HSV HOU',
	'basePath'            => dirname(__DIR__),
	'controllerNamespace' => 'backend\controllers',
	'bootstrap'           => ['log'],
	'modules'             => [],
	'components'          => [
		'assetManager' => [
			'bundles' => [
				'',
			],
		],
		'request'      => [
			'csrfParam' => '_csrf-backend',
		],
		'user'         => [
			'identityClass'   => 'common\models\Admin',
			'enableAutoLogin' => true,
			'identityCookie'  => [
				'name'     => '_identity-backend',
				'httpOnly' => true,
			],
		],
		'session'      => [
			// this is the name of the session cookie used for login on the backend
			'name' => 'advanced-backend',
		],
		'log'          => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets'    => [
				[
					'class'  => \yii\log\FileTarget::class,
					'levels' => [
						'error',
						'warning',
					],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
//		'urlManager'   => [
//			'class'           => UrlManager::class,
//			'enablePrettyUrl' => true,
//			'showScriptName'  => false,
//			'normalizer'      => [
//				'class'                  => 'yii\web\UrlNormalizer',
//				'collapseSlashes'        => true,
//				'normalizeTrailingSlash' => true,
//			],
//			'rules'           => [],
//		],
	],
	'params'              => $params,
];
