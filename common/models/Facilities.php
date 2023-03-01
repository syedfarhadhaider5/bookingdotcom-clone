<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "facilities".
 *
 * @property int $id
 * @property string|null $name
 * @property string $created_at
 *
 * @property HotelFacility[] $hotelFacilities
 * @property Hotels[] $hotels
 */
class Facilities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facilities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[HotelFacilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelFacilities()
    {
        return $this->hasMany(HotelFacility::class, ['facility_id' => 'id']);
    }

    /**
     * Gets query for [[Hotels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotels()
    {
        return $this->hasMany(Hotels::class, ['id' => 'hotel_id'])->viaTable('hotel_facility', ['facility_id' => 'id']);
    }
}
