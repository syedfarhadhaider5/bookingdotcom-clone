<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_stars}}`.
 */
class m230301_212032_create_hotel_stars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_stars}}', [
            'id' => $this->primaryKey(),
            'rank' => $this->integer()->notNull(),
            'hotel_id' => $this->integer()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->addForeignKey(
            'hotel_stars_fk',
            '{{%hotel_stars}}',
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
        $this->dropTable('{{%hotel_stars}}');
    }
}
