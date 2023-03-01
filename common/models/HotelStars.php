<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_stars".
 *
 * @property int $id
 * @property int $rank
 * @property int|null $hotel_id
 * @property string $created_at
 *
 * @property Hotels $hotel
 */
class HotelStars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_stars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rank'], 'required'],
            [['rank', 'hotel_id'], 'integer'],
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
            'rank' => 'Rank',
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
