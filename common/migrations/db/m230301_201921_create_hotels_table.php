<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotels}}`.
 */
class m230301_201921_create_hotels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotels}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(550)->notNull(),
            'description' => $this->string(550)->notNull(),
            'phone_number' => $this->integer()->notNull(),
            'questions' => $this->text()->null(),
            'city' => $this->string(550)->notNull(),
            'lat_location' => $this->string(550)->null(),
            'long_location' => $this->string(550)->null(),
            'zip_code' => $this->integer()->null(),
            'country' => $this->string(550)->null(),
            'email' => $this->string(550)->notNull(),
            'website' => $this->string(550)->null(),
            'address' => $this->string(550)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')



        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hotels}}');
    }
}
