<?php

use yii\db\Schema;
use yii\db\Migration;

class m230507_142611_title extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%title}}', [
			'id'   => Schema::TYPE_PK . '',
			'name' => Schema::TYPE_TEXT . ' NOT NULL',
		], $tableOptions);
	}

	public function safeDown() {
		$this->dropTable('{{%title}}');
	}
}
