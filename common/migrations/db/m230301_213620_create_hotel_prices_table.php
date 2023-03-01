<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_prices}}`.
 */
class m230301_213620_create_hotel_prices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_prices}}', [
            'id' => $this->primaryKey(),
            'amount' => $this->string(500)->notNull(),
            'hotel_id' => $this->integer()->null(),
            'tax' => $this->string(500)->null(),
            'discount' => $this->string(500)->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
        $this->addForeignKey(
            'hotel_prices_fk',
            '{{%hotel_prices}}',
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
        $this->dropTable('{{%hotel_prices}}');
    }
}
