<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel_images}}`.
 */
class m230301_203008_create_hotel_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel_images}}', [
            'id' => $this->primaryKey(),
            'image_path' => $this->string(550)->notNull(),
            'hotel_id' => $this->integer()->null(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
        $this->addForeignKey(
            'hotel_images_fk',
            '{{%hotel_images}}',
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
        $this->dropTable('{{%hotel_images}}');
    }
}
