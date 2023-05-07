<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Image;
use yii\web\Controller;

class ImageController extends Controller {

	public function actionIndex($name,$title_id) {
		$Images = Image::find()->where([
			'title_id' => $title_id,
		])->all();
		$banner = Banner::find()->orderBy(['id' => SORT_DESC])->one();
		if ($banner === null) {
			$banner_image = '/images/Background.png';
		} else {
			$banner_image = $banner->image_url;
		}
		return $this->render('index', [
			'Images' => $Images,
			'banner_image' => $banner_image,
		]);
	}
}
