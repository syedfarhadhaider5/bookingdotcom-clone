<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_facility}}`.
 */
class m230301_214330_create_hotel_facility_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_facility}}', [
            'hotel_id' => $this->integer()->null(),
            'facility_id' => $this->integer()->null(),
            'PRIMARY KEY(hotel_id, facility_id)',
        ]);
        $this->addForeignKey(
            'fk-hotel-facility-hotel_id',
            '{{%hotel_facility}}',
            ['hotel_id'],
            '{{%hotels}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-hotel-facility-facility_id',
            '{{%hotel_facility}}',
            ['facility_id'],
            '{{%facilities}}',
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
        $this->dropTable('{{%hotel_facility}}');
        $this->dropTable('{{%hotels}}');
        $this->dropTable('{{%facilities}}');
    }
}
