<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_meal".
 *
 * @property int $hotel_id
 * @property int $meal_id
 *
 * @property Hotels $hotel
 * @property Meals $meal
 */
class HotelMeal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_meal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'meal_id'], 'required'],
            [['hotel_id', 'meal_id'], 'integer'],
            [['hotel_id', 'meal_id'], 'unique', 'targetAttribute' => ['hotel_id', 'meal_id']],
            [['hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotels::class, 'targetAttribute' => ['hotel_id' => 'id']],
            [['meal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meals::class, 'targetAttribute' => ['meal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hotel_id' => 'Hotel ID',
            'meal_id' => 'Meal ID',
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

    /**
     * Gets query for [[Meal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeal()
    {
        return $this->hasOne(Meals::class, ['id' => 'meal_id']);
    }
}
