<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotels".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $phone_number
 * @property string|null $questions
 * @property string|null $lat_location
 * @property string|null $long_location
 * @property int|null $zip_code
 * @property string|null $country
 * @property string $email
 * @property string|null $website
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property string $country_slug
 * @property string $name_slug
 * @property int|null $is_enabled
 * @property Facilities[] $facilities
 * @property HotelFacility[] $hotelFacilities
 * @property HotelImages[] $hotelImages
 * @property HotelMeal[] $hotelMeals
 * @property HotelPrices[] $hotelPrices
 * @property HotelRatings[] $hotelRatings
 * @property HotelRoom[] $hotelRooms
 * @property HotelStars[] $hotelStars
 * @property HotelViews[] $hotelViews
 * @property Meals[] $meals
 */
class Hotels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'phone_number', 'email', 'address', 'country_slug', 'name_slug'], 'required'],
            [['phone_number', 'zip_code','is_enabled'], 'integer'],
            [['questions'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description', 'lat_location', 'long_location', 'country', 'email', 'website', 'address'], 'string', 'max' => 550],
            [['phone_number', 'country_slug', 'name_slug'], 'string', 'max' => 255],

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
            'description' => 'Description',
            'phone_number' => 'Phone Number',
            'questions' => 'Questions',
            'lat_location' => 'Lat Location',
            'long_location' => 'Long Location',
            'zip_code' => 'Zip Code',
            'country' => 'Country',
            'email' => 'Email',
            'website' => 'Website',
            'address' => 'Hotel Location',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'country_slug' => 'Country Slug',
            'name_slug' => 'Name Slug',
            'is_enabled' => 'Is Enabled',
        ];
    }

    /**
     * Gets query for [[Facilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facilities::class, ['id' => 'facility_id'])->viaTable('hotel_facility', ['hotel_id' => 'id']);
    }
    /**
     * Total Facilities [[Facilities]].
     */
    public function getTotalFacilities()
    {
        return $this->hasMany(Facilities::class, ['id' => 'facility_id'])->viaTable('hotel_facility', ['hotel_id' => 'id'])->count();
    }

    /**
     * Gets query for [[HotelFacilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelFacilities()
    {
        return $this->hasMany(HotelFacility::class, ['hotel_id' => 'id']);
    }
    /**
     * Gets query for [[HotelImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelImages()
    {
        return $this->hasMany(HotelImages::class, ['hotel_id' => 'id']);
    }

    /**
     * Gets query for [[HotelMeals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelMeals()
    {
        return $this->hasMany(HotelMeal::class, ['hotel_id' => 'id']);
    }

    /**
     * Gets query for [[HotelPrices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelPrices()
    {
        return $this->hasMany(HotelPrices::class, ['hotel_id' => 'id']);
    }

    /**
     * Gets query for [[HotelRatings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelRatings()
    {
        return $this->hasMany(HotelRatings::class, ['hotel_id' => 'id']);
    }

    /**
     * Gets query for [[HotelRooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelRooms()
    {
        return $this->hasMany(HotelRoom::class, ['hotel_id' => 'id']);
    }

    /**
     * Gets query for [[HotelStars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelStars()
    {
        return $this->hasMany(HotelStars::class, ['hotel_id' => 'id']);
    }

    /**
     * Gets query for [[HotelViews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHotelViews()
    {
        return $this->hasMany(HotelViews::class, ['hotel_id' => 'id']);
    }

    /**
     * Gets query for [[Meals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeals()
    {
        return $this->hasMany(Meals::class, ['id' => 'meal_id'])->viaTable('hotel_meal', ['hotel_id' => 'id']);
    }
    /**
     * Total hotel count [[Meals]].
     *
     */
    public function getTotalHotelMeals()
    {
        return $this->hasMany(Meals::class, ['id' => 'meal_id'])->viaTable('hotel_meal', ['hotel_id' => 'id'])->count();
    }
}
