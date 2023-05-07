<?php

use yii\db\Schema;
use yii\db\Migration;

class m230507_142611_admin extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable(
            '{{%admin}}',
            [
                'id'=> Schema::TYPE_PK.'',
                'username'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'password_hash'=> Schema::TYPE_STRING.'(255) NOT NULL',
                'status'=> Schema::TYPE_INTEGER.' NOT NULL',
                'created_at'=> Schema::TYPE_INTEGER.' NOT NULL',
                'updated_at'=> Schema::TYPE_INTEGER.' NOT NULL',
                'super_admin'=> Schema::TYPE_INTEGER.' NOT NULL',
                ],
            $tableOptions
        );

        $this->createIndex('username', '{{%admin}}','username',0);    $this->insert('{{%admin}}',['id'=>'1','username'=>'admin','password_hash'=>'$2y$13$WbfTAILjlOeGZOBtp.gyEOo2d7I8ny/ubIvCnqvwensMngg8fKDq.','status'=>'10','created_at'=>'1664786357','updated_at'=>'1664786357','super_admin'=>'1']);

    }

    public function safeDown()
    {
        $this->dropIndex('username', '{{%admin}}');
        $this->dropTable('{{%admin}}');
    }
}
