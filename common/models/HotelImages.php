<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_images".
 *
 * @property int $id
 * @property string $image_path
 * @property int|null $hotel_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Hotels $hotel
 */
class HotelImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_path'], 'required'],
            [['hotel_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image_path'], 'string', 'max' => 550],
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
            'image_path' => 'Image Path',
            'hotel_id' => 'Hotel ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
