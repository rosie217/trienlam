<?php

namespace backend\models\search;

use common\models\Admin;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AdminSearch represents the model behind the search form of `common\models\Admin`.
 */
class AdminSearch extends Admin {

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				[
					'id',
					'status',
					'created_at',
					'updated_at',
					'super_admin',
				],
				'integer',
			],
			[
				[
					'username',
					'password_hash',
				],
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
		$query = Admin::find();
		// add conditions that should always apply here
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
		$this->load($params);
		if (!$this->validate()) {
			return $dataProvider;
		}
		$query->andFilterWhere([
			'id'          => $this->id,
			'status'      => $this->status,
			'created_at'  => $this->created_at,
			'updated_at'  => $this->updated_at,
			'super_admin' => $this->super_admin,
		]);
		$query->andFilterWhere([
			'like',
			'username',
			$this->username,
		])->andFilterWhere([
			'like',
			'password_hash',
			$this->password_hash,
		]);
		$query->andWhere([
			'<>',
			'id',
			1,
		]);
		return $dataProvider;
	}
}
