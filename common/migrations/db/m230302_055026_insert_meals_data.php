<?php

use yii\db\Migration;

/**
 * Class m230302_055026_insert_meals_data
 */
class m230302_055026_insert_meals_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $mealNames = [
            'Coffee',
            'Fruits',
            'Kid-friendly buffet',
            'Kid meals',
            'Special diet menus (on request)',
            'Snack bar',
            'Bar',
            'Restaurant',
            'Tea/Coffee maker'
        ];
        // Insert 9 records with different meal names
        for ($i = 0; $i < 9; $i++) {
            $this->insert('meals', [
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
        for ($i = 1; $i <= 9; $i++) {
            $this->delete('meal', ['id' => $i]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230302_055026_insert_meals_data cannot be reverted.\n";

        return false;
    }
    */
}
