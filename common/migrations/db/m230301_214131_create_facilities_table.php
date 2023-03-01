<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%facilities}}`.
 */
class m230301_214131_create_facilities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%facilities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(500)->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%facilities}}');
    }
}
