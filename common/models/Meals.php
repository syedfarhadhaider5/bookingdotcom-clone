<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meals".
 *
 * @property int $id
 * @property string|null $name
 * @property string $created_at
 *
 * @property HotelMeal[] $hotelMeals
 * @property Hotels[] $hotels
 */
class Meals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meals';
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
     * Gets query for [[HotelMeals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelMeals()
    {
        return $this->hasMany(HotelMeal::class, ['meal_id' => 'id']);
    }

    /**
     * Gets query for [[Hotels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotels()
    {
        return $this->hasMany(Hotels::class, ['id' => 'hotel_id'])->viaTable('hotel_meal', ['meal_id' => 'id']);
    }
}
