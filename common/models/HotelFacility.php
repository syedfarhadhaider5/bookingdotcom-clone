<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_facility".
 *
 * @property int $hotel_id
 * @property int $facility_id
 *
 * @property Facilities $facility
 * @property Hotels $hotel
 */
class HotelFacility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_facility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'facility_id'], 'required'],
            [['hotel_id', 'facility_id'], 'integer'],
            [['hotel_id', 'facility_id'], 'unique', 'targetAttribute' => ['hotel_id', 'facility_id']],
            [['facility_id'], 'exist', 'skipOnError' => true, 'targetClass' => Facilities::class, 'targetAttribute' => ['facility_id' => 'id']],
            [['hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotels::class, 'targetAttribute' => ['hotel_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hotel_id' => 'Hotel ID',
            'facility_id' => 'Facility ID',
        ];
    }

    /**
     * Gets query for [[Facility]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facilities::class, ['id' => 'facility_id']);
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
