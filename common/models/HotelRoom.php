<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_room".
 *
 * @property int $id
 * @property int $total
 * @property int|null $hotel_id
 * @property int|null $booked
 * @property int|null $available
 * @property string $created_at
 *
 * @property Hotels $hotel
 */
class HotelRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total'], 'required'],
            [['total', 'hotel_id', 'booked', 'available'], 'integer'],
            [['created_at'], 'safe'],
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
            'total' => 'Total',
            'hotel_id' => 'Hotel ID',
            'booked' => 'Booked',
            'available' => 'Available',
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
