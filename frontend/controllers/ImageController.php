<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Image;
use common\models\Title;
use yii\web\Controller;

class ImageController extends Controller {

	public function actionIndex($name,$title_id) {
		$Images = Image::find()->where([
			'title_id' => $title_id,
		])->all();
        $title = Title::find()->where(['id'=>$title_id])->all();
        $title_name= $title[0]->name;
		$banner = Banner::find()->orderBy(['id' => SORT_DESC])->one();
		if ($banner === null) {
			$banner_image = '/images/Background.png';
		} else {
			$banner_image = $banner->image_url;
		}
		return $this->render('index', [
			'Images' => $Images,
			'banner_image' => $banner_image,
            'title_name'=>$title_name,
		]);
	}
}
