<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_prices".
 *
 * @property int $id
 * @property string $amount
 * @property int|null $hotel_id
 * @property string|null $tax
 * @property string|null $discount
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Hotels $hotel
 */
class HotelPrices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_prices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount'], 'required'],
            [['hotel_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['amount', 'tax', 'discount'], 'string', 'max' => 500],
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
            'amount' => 'Amount',
            'hotel_id' => 'Hotel ID',
            'tax' => 'Tax',
            'discount' => 'Discount',
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
