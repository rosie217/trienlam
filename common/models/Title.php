<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "title".
 *
 * @property int     $id
 * @property string  $name
 *
 * @property Image[] $images
 */
class Title extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'title';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				['name'],
				'required',
			],
			[
				['name'],
				'string',
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'   => 'ID',
			'name' => 'Name',
		];
	}

	/**
	 * Gets query for [[Images]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getImages() {
		return $this->hasMany(Image::class, ['title_id' => 'id']);
	}
}
