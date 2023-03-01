<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_ratings".
 *
 * @property int $id
 * @property string|null $score
 * @property string|null $description
 * @property int|null $hotel_id
 * @property string $created_at
 *
 * @property Hotels $hotel
 */
class HotelRatings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_ratings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id'], 'integer'],
            [['created_at'], 'safe'],
            [['score', 'description'], 'string', 'max' => 500],
            [['hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotels::class, 'targetAttribute' => ['hotel_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'score' => 'Score',
            'description' => 'Description',
            'hotel_id' => 'Hotel ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Hotel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotels::class, ['id' => 'hotel_id']);
    }
}
