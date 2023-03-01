<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_views}}`.
 */
class m230301_211446_create_hotel_views_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_views}}', [
            'id' => $this->primaryKey(),
            'view' => $this->integer()->null(),
            'hotel_id' => $this->integer()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->addForeignKey(
            'hotel_views_fk',
            '{{%hotel_views}}',
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
        $this->dropTable('{{%hotel_views}}');
    }
}
