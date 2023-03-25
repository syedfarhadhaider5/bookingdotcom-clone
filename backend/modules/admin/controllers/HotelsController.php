<?php
namespace backend\modules\admin\controllers;

use common\models\HotelFacility;
use common\models\HotelImages;
use common\models\HotelMeal;
use common\models\HotelPrices;
use common\models\HotelRoom;
use common\models\Hotels;
use common\models\HotelStars;
use Yii;

class HotelsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model =  Hotels::find()->orderBy(['id' => 'DESC'])->all();
        return $this->render('index', ['hotels' => $model]);
    }
    public function slugify($text) {
        // Convert the string to lowercase
        $text = strtolower($text);

        // Replace non-alphanumeric characters with a separator
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);

        // Remove any leading or trailing separator
        $text = trim($text, '-');

        return $text;
    }
    public function actionCreate()
    {
        $model = new Hotels();
        if ($model->load(Yii::$app->request->post())) {

            $country = $_POST['Hotels']['country'];
            $name = $_POST['Hotels']['name'];
            $countrySlug = $this->slugify($country);
            $nameSlug = $this->slugify($name);

            $model->country_slug = $countrySlug;
            $model->name_slug = $nameSlug;

            if ($model->save()) {
                $id = $model->getPrimaryKey();
                return $this->redirect('update?id=' . $id);
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Hotels::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $country = $_POST['Hotels']['country'];
            $name = $_POST['Hotels']['name'];

            $countrySlug = $this->slugify($country);
            $nameSlug = $this->slugify($name);

            $model->country_slug = $countrySlug;
            $model->name_slug = $nameSlug;
            if ($model->save()) {
                return $this->redirect('update?id=' . $id);
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionSaveImage($id)
    {
        $model = new HotelImages();
        if ($model->load(Yii::$app->request->post())) {
            $model->hotel_id = $id;
            if ($model->save()) {
                return $this->redirect('update?id=' . $id);
            }
        }
    }
    public function actionSaveStars($id)
    {
        if(HotelStars::find()->where(['hotel_id' => $id])->one()) {
            $model = HotelStars::find()->where(['hotel_id' => $id])->one();
        }else{
            $model = new HotelStars();
        }        if ($model->load(Yii::$app->request->post())) {
            $model->hotel_id = $id;
            if ($model->save()) {
                return $this->redirect('update?id=' . $id);
            }
        }
    }
    public function actionSavePrice($id)
    {
        if(HotelPrices::find()->where(['hotel_id' => $id])->one()) {
            $model = HotelPrices::find()->where(['hotel_id' => $id])->one();
        }else{
            $model = new HotelPrices();
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->hotel_id = $id;
            if ($model->save()) {
                return $this->redirect('update?id=' . $id);
            }
        }
    }
    public function actionSaveRooms($id)
    {
        if(HotelRoom::find()->where(['hotel_id' => $id])->one()) {
            $model = HotelRoom::find()->where(['hotel_id' => $id])->one();
        }else{
            $model = new HotelRoom();
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->hotel_id = $id;
            if ($model->save()) {
                return $this->redirect('update?id=' . $id);
            }
        }
    }
    public function actionSaveMeals($id)
    {
       $mealId = Yii::$app->request->post('meal_id');
           $existingOrderMeal = HotelMeal::find()
               ->where(['hotel_id' => $id, 'meal_id' => $mealId])
               ->one();
           if(!$existingOrderMeal){
               $hotelmeal = new HotelMeal();
               $hotelmeal->meal_id = $mealId;
               $hotelmeal->hotel_id = $id;
               $hotelmeal->save();
           }
    }
    public function actionRemoveMeal($id)
    {
        $meadId = Yii::$app->request->post('meal_id');
        $existingOrderMeal = HotelMeal::find()
            ->where(['hotel_id' => $id, 'meal_id' => $meadId])
            ->one();
        $existingOrderMeal->delete();
    }
    public function actionSaveFacility($id)
    {
        $facility_id = Yii::$app->request->post('facility_id');
        $hotelFacility = HotelFacility::find()
            ->where(['hotel_id' => $id, 'facility_id' => $facility_id])
            ->one();
        if(!$hotelFacility){
            $hotelFacility = new HotelFacility();
            $hotelFacility->facility_id = $facility_id;
            $hotelFacility->hotel_id = $id;
            $hotelFacility->save();
        }
    }
    public function actionRemoveFacility($id)
    {
        $facility_id = Yii::$app->request->post('facility_id');
        $hotelFacility = HotelFacility::find()
            ->where(['hotel_id' => $id, 'facility_id' => $facility_id])
            ->one();
        $hotelFacility->delete();

    }
    public function actionRemoveHotel($id)
    {
        $hotels = Hotels::findOne($id);
        $hotels->delete();
        return $this->redirect('index');
    }
}
