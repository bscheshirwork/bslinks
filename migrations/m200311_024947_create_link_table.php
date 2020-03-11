<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%link}}`.
 */
class m200311_024947_create_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%link}}', [
            'id' => $this->primaryKey(),
            'date' => $this->datetime()->notNull()->defaultExpression('NOw()'),
            'favicon' => $this->binary()->null(),
            'url' => $this->string(3072/4)->notNull(), // 3072 for index
            'title' => $this->text(),
            'metaDescription' => $this->text(),
            'metaKeywords' => $this->text(),
        ]);
        $this->createIndex('ui_l_url', '{{%link}}', 'url', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%link}}');
    }
}
