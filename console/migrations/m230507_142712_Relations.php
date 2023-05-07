<?php

use yii\db\Schema;
use yii\db\Migration;

class m230507_142712_Relations extends Migration {

	public function safeUp() {
		$this->addForeignKey('fk_image_title_id', '{{%image}}', 'title_id', 'title', 'id');
	}

	public function safeDown() {

		$this->dropForeignKey('fk_image_title_id', '{{%image}}');
	}
}
