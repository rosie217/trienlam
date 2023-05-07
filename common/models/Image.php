<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "image".
 *
 * @property int      $id
 * @property string   $image_url
 * @property int|null $title_id
 *
 * @property Title    $title
 */
class Image extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'image';
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
			[
				['title_id'],
				'integer',
			],
			[
				['title_id'],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => Title::class,
				'targetAttribute' => ['title_id' => 'id'],
			],
		];
	}

	/**
	 * @var UploadedFile[]
	 */
	public $images;

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'        => 'ID',
			'image_url' => 'Image Url',
			'title_id'  => 'Title ID',
		];
	}

	/**
	 * Gets query for [[Title]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getTitle() {
		return $this->hasOne(Title::class, ['id' => 'title_id']);
	}
}
