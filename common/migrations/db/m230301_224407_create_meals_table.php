<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meals}}`.
 */
class m230301_224407_create_meals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%meals}}', [
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
        $this->dropTable('{{%meals}}');
    }
}
