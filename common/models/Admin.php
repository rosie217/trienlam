<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admin".
 *
 * @property int    $id
 * @property string $username
 * @property string $password_hash
 * @property int    $status
 * @property int    $created_at
 * @property int    $updated_at
 * @property int    $super_admin
 */
class Admin extends \yii\db\ActiveRecord implements IdentityInterface {

	const   STATUS_ACTIVE        = 10;

	const   STATUS_NONACTIVE     = 0;

	const   STATUS               = [
		self::STATUS_ACTIVE    => 'Active',
		self::STATUS_NONACTIVE => 'NonActive',
	];

	const   SUPERADMIN_ACTIVE    = 1;

	const   SUPERADMIN_NONACTIVE = 0;

	const   SUPERADMIN           = [
		self::SUPERADMIN_ACTIVE     => 'Active',
		self:: SUPERADMIN_NONACTIVE => 'NonActive',
	];

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'admin';
	}

	/**
	 * $username = admin
	 */
	public static function findByUsername($username) {
		return self::findOne(array('username' => $username));
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[
				'username',
				'unique',
			],
			[
				[
					'username',
					'password_hash',
					'status',
					'super_admin',
				],
				'required',
			],
			[
				[
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
				'string',
				'max' => 255,
			],
		];
	}

	public function behaviors() {
		return [
			TimestampBehavior::class,
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'            => 'ID',
			'username'      => 'Username',
			'password_hash' => 'Password Hash',
			'status'        => 'Status',
			'created_at'    => 'Created At',
			'updated_at'    => 'Updated At',
			'super_admin'   => 'Super Admin',
		];
	}

	public static function findIdentity($id) {
		return self::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null) {
		return null;
	}

	public function getId() {
		return $this->id;
	}

	public function getAuthKey() {
		return null;
	}

	public function validateAuthKey($authKey) {
		return false;
	}

	public function validatePassword($password) {
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}
}
