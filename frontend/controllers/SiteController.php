<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Title;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller {

	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class' => VerbFilter::class,
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions() {
		return [
			'error'   => [
				'class' => \yii\web\ErrorAction::class,
			],
			'captcha' => [
				'class'           => \yii\captcha\CaptchaAction::class,
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return mixed
	 */
	public function actionIndex() {
		$titles = Title::find()->all();
		$banner = Banner::find()->orderBy(['id' => SORT_DESC])->one();
		if ($banner === null) {
			$banner_image = '/images/Background.png';
		} else {
			$banner_image = $banner->image_url;
		}
		return $this->render('index', [
			'titles'       => $titles,
			'banner_image' => $banner_image,
		]);
	}
}
