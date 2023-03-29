<?php
namespace api\modules\version1\controllers;
use common\models\Hotels;
use yii\db\Expression;
use yii\rest\ActiveController;


class HotelController extends ActiveController
{
    public $modelClass = 'api\modules\version1\resources\Hotel';

    public function actionSearch()
    {
        $searchTerm = \Yii::$app->request->get('q');
        $query = Hotels::find();
        $query->where(['like', 'country', $searchTerm])
            ->limit(1);
        $countryResults = $query->select(['id','country' => new Expression("IF(country LIKE '%{$searchTerm}%', country, NULL)")])->all();
        $query = Hotels::find();
        $query->where(['like', 'name', $searchTerm])
            ->limit(5);
        $nameResults = $query->select(['id','name' => new Expression("IF(name LIKE '%{$searchTerm}%', name, NULL)")])->all();
        // Merge the results
        $result = array_merge($countryResults, $nameResults);

        if (count($result) > 0) {
            return $result;

        } else {
            return ['error' => 'record not found'];
        }
    }
    public function actionFindByNameOrCountry()
    {
        $q = \Yii::$app->request->get('q');
        //,hotelRooms,hotelStars,hotelViews,meals,facilities,hotelPrices
        $result =Hotels::find()->with('hotelImages')->with('hotelMeals')->with('hotelRooms')->with('hotelStars')->with('hotelViews')->with('meals')->with('facilities')->with('hotelPrices')->where(['=','country_slug', $q])->orWhere(['=','name_slug', $q])->all();
        if (count($result) > 0) {
            return $result;
        } else {
            return ['error' => 'record not found'];
        }
    }

}