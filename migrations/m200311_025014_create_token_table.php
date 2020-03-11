<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%token}}`.
 */
class m200311_025014_create_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%token}}', [
            'linkId' => $this->integer()->notNull(),
            'hash' => $this->string(60),
        ]);
        $this->createIndex('ui_linkId', '{{%token}}', 'linkId', true);
        $this->addForeignKey('fk_t_tl_pk', '{{%token}}', 'linkId', '{{%link}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%token}}');
    }
}
