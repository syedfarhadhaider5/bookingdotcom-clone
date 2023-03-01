<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_ratings}}`.
 */
class m230301_211548_create_hotel_ratings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_ratings}}', [
            'id' => $this->primaryKey(),
            'score' => $this->string(500)->null(),
            'description' => $this->string(500)->null(),
            'hotel_id' => $this->integer()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->addForeignKey(
            'hotel_ratings_fk',
            '{{%hotel_ratings}}',
            ['hotel_id'],
            '{{%hotels}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hotel_ratings}}');
    }
}
