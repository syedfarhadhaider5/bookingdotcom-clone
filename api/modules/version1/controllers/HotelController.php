<?php
namespace api\modules\version1\controllers;
use yii\rest\ActiveController;


class HotelController extends ActiveController
{
    public $modelClass = 'api\modules\version1\resources\Hotel';
}