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
       // $searchTerm = explode(' ', $searchTerm);

        $query = Hotels::find();
        $query->where(['like', 'country', $searchTerm])->limit(1)
            ->orWhere(['like', 'name', $searchTerm]);

        // only select columns that match the search term
        $result =   $query->select(['id','country' => new Expression("IF(country LIKE '%{$searchTerm}%', country, NULL)"),
            'name' => new Expression("IF(name LIKE '%{$searchTerm}%', name, NULL)"),
            ])->all();

        if (count($result) > 0) {
            return $result;

        } else {
            return ['error' => 'record not found'];
        }
    }

}