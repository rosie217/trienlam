<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int    $id
 * @property string $image_url
 */
class Banner extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'banner';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				['image_url'],
				'required',
			],
			[
				['image_url'],
				'string',
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'        => 'ID',
			'image_url' => 'Image Url',
		];
	}
}
