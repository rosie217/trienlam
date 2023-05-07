<?php

use yii\db\Schema;
use yii\db\Migration;

class m230507_142611_banner extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%banner}}', [
			'id'        => Schema::TYPE_PK . '',
			'image_url' => Schema::TYPE_TEXT . ' NOT NULL',
		], $tableOptions);
	}

	public function safeDown() {
		$this->dropTable('{{%banner}}');
	}
}
