<?php

use yii\db\Migration;

/**
 * Class m230302_055810_insert_facilities_data
 */
class m230302_055810_insert_facilities_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $mealNames = [
            'Private bathroom',
            'Toilet paper',
            'Alarm clock',
            'Dressing room',
            'City view',
            'Sea view',
            'Outdoor furniture',
            'Electric kettle',
            'Seating Area',
            'Flat-screen TV',
            'TV',
            'Free WiFi',
            'Parking garage',
            'Currency exchange',
            '24-hour front desk',
            'Daily housekeeping',
            'Laundry',
            '24-hour security',
            'Higher level toilet',
            'Pool is on rooftop',
            'Kids pool',
            'English',
            'Arabic',
            'Urdu',
        ];
        // Insert 24 records with different meal names
        for ($i = 0; $i < 24; $i++) {
            $this->insert('facilities', [
                'name' => $mealNames[$i],
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Delete the 9 records that were inserted
        for ($i = 1; $i <= 23; $i++) {
            $this->delete('facilities', ['id' => $i]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230302_055810_insert_facilities_data cannot be reverted.\n";

        return false;
    }
    */
}
