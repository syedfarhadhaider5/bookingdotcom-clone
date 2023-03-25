<?php

use yii\db\Migration;

/**
 * Class m230325_170001_add_one_column_into_hotel_table
 */
class m230325_170001_add_one_column_into_hotel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('hotels', 'is_enabled', $this->boolean()->null()->defaultValue(true));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('hotels', 'is_enabled');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230325_170001_add_one_column_into_hotel_table cannot be reverted.\n";

        return false;
    }
    */
}
