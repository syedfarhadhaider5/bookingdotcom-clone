<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_room}}`.
 */
class m230301_213015_create_hotel_room_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_room}}', [
            'id' => $this->primaryKey(),
            'total' => $this->integer()->notNull(),
            'hotel_id' => $this->integer()->null(),
            'booked' => $this->integer()->null(),
            'available' => $this->integer()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->addForeignKey(
            'hotel_room_fk',
            '{{%hotel_room}}',
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
        $this->dropTable('{{%hotel_room}}');
    }
}
