<?php

use yii\db\Migration;

/**
 * Class m230303_130822_remove_city_column_from_hotels_table
 */
class m230303_130822_remove_city_column_from_hotels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('hotels', 'city');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230303_130822_remove_city_column_from_hotels_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230303_130822_remove_city_column_from_hotels_table cannot be reverted.\n";

        return false;
    }
    */
}
