<?php

use yii\db\Migration;

/**
 * Class m230325_160300_add_two_column_into_hotel_table
 */
class m230325_160300_add_two_column_into_hotel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('hotels', 'country_slug', $this->string(255)->notNull());
        $this->addColumn('hotels', 'name_slug', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230325_160300_add_two_column_into_hotel_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230325_160300_add_two_column_into_hotel_table cannot be reverted.\n";

        return false;
    }
    */
}
