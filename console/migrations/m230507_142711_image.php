<?php

use yii\db\Schema;
use yii\db\Migration;

class m230507_142711_image extends Migration {

	public function safeUp() {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$this->createTable('{{%image}}', [
			'id'        => Schema::TYPE_PK . '',
			'image_url' => Schema::TYPE_TEXT . ' NOT NULL',
			'title_id'  => Schema::TYPE_INTEGER . '',
		], $tableOptions);
		$this->createIndex('title_id', '{{%image}}', 'title_id', 0);
	}

	public function safeDown() {
		$this->dropIndex('title_id', '{{%image}}');
		$this->dropTable('{{%image}}');
	}
}
