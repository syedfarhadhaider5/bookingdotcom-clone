<?php

use yii\db\Migration;

/**
 * Class m230303_133057_alter_phone_number_column_of_hotels
 */
class m230303_133057_alter_phone_number_column_of_hotels extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('hotels', 'phone_number', $this->string(255)->notNull());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230303_133057_alter_phone_number_column_of_hotels cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230303_133057_alter_phone_number_column_of_hotels cannot be reverted.\n";

        return false;
    }
    */
}
