<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_meal}}`.
 */
class m230301_224457_create_hotel_meal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_meal}}', [
            'hotel_id' => $this->integer()->notNull(),
            'meal_id' => $this->integer()->notNull(),
            'PRIMARY KEY(hotel_id, meal_id)',

        ]);
        $this->addForeignKey(
            'fk-hotel-meal-hotel_id',
            '{{%hotel_meal}}',
            ['hotel_id'],
            '{{%hotels}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-hotel-meal-meal_id',
            '{{%hotel_meal}}',
            ['meal_id'],
            '{{%meals}}',
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
        $this->dropTable('{{%hotel_meal}}');
        $this->dropTable('{{%hotels}}');
        $this->dropTable('{{%meals}}');
    }
}
