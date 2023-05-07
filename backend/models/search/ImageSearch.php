<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Image;

/**
 * ImageSearch represents the model behind the search form of `common\models\Image`.
 */
class ImageSearch extends Image {

	public $title_name = '';

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				[
					'id',
					'title_id',
				],
				'integer',
			],
			[
				'title_name',
				'string',
			],
			[
				['image_url'],
				'safe',
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = Image::find();
		// add conditions that should always apply here
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
		$this->load($params);
		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}
		// grid filtering conditions
		$query->andFilterWhere([
			'id'       => $this->id,
			'title_id' => $this->title_id,
		]);
		$query->andFilterWhere([
			'like',
			'image_url',
			$this->image_url,
		]);
		if ($this->title_name != '') {
			$query->leftJoin('title', 'image.title_id = title.id')->andWhere([
				'LIKE',
				'title.name',
				$this->title_name,
			]);
		}
		return $dataProvider;
	}
}
