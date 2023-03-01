<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_views".
 *
 * @property int $id
 * @property int|null $view
 * @property int|null $hotel_id
 * @property string $created_at
 *
 * @property Hotels $hotel
 */
class HotelViews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_views';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['view', 'hotel_id'], 'integer'],
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
            'view' => 'View',
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
