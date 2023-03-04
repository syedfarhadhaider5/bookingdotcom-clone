<?php
use common\models\User;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hotels */
/* @var $form yii\bootstrap4\ActiveForm */
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$form = ActiveForm::begin()
?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->field($model, 'name')->textInput(['placeholder' => 'Name','readOnly' => true]) ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->field($model, 'phone_number')->textInput(['placeholder' => 'Phone']) ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->field($model, 'address')->textInput(['placeholder' => 'Location']) ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->field($model, 'email')->textInput(['placeholder' => 'Email']) ?>
                <div class="d-none">
                    <?php echo $form->field($model, 'lat_location')->textInput() ?>
                    <?php echo $form->field($model, 'long_location')->textInput() ?>
                    <?php echo $form->field($model, 'zip_code')->textInput() ?>
                    <?php echo $form->field($model, 'country')->textInput() ?>
                </div>
            </div>
            <div class="col-md-12">
                <?php echo $form->field($model, 'description')->textarea([['rows' => 6, 'cols' => 10, 'placeholder' => 'Enter your description here']]) ?>
                <div class="float-end">
                    <?php echo Html::submitButton(

                            isset($_GET['id']) ? 'Update' : 'Save', ['class' => 'btn btn-block bg-gradient-info']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    ActiveForm::end();
    $model = new \common\models\HotelImages();
    $form = ActiveForm::begin([
    'action' => Yii::$app->urlManager->createUrl('admin/hotels/save-image?id=' . $id)
]);
    if(isset($_GET['id'])){
?>
<div class="card">
    <div class="card-header">
       <div class="d-flex align-items-center justify-content-between">
           <div class="text-bold text-primary">
               Upload Hotel Image
           </div>
           <div>
               Total Image of this Hotel
               <div class="badge bg-secondary">
                   <?php
                   if(isset($model)){
                       echo \common\models\HotelPrices::find()->where(['hotel_id' => $id])->count();
                   }
                   ?>
               </div>
           </div>
       </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->field($model, 'image_path')->textInput(['placeholder' => 'Image Link']) ?>
                <div class="float-end">
                    <?php echo Html::submitButton('Save', ['class' => 'btn btn-block bg-gradient-info']) ?>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>
<?php
}
    ActiveForm::end();
if(\common\models\HotelRoom::find()->where(['hotel_id' => $id])->one()){
    $model = \common\models\HotelRoom::find(['hotel_id' => $id])->one();
}else{
    $model = new \common\models\HotelRoom();
}
    $form = ActiveForm::begin([
    'action' => Yii::$app->urlManager->createUrl('admin/hotels/save-rooms?id=' . $id)
]);
    if(isset($_GET['id'])){
?>
<div class="card">
    <div class="card-header">
       <div class="d-flex align-items-center justify-content-between">
           <div class="text-bold text-primary">
                Enter Hotel Room
           </div>
           <div>
               Total Room of this Hotel
               <div class="badge bg-secondary">
                   <?php
                   if(isset($model)){
                       echo \common\models\HotelRoom::find()->where(['hotel_id' => $id])->one()->total;
                   }
                   ?>
               </div>
           </div>
       </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->field($model, 'total')->textInput(['placeholder' => 'Totel Room']) ?>
                <div class="float-end">
                    <?php echo Html::submitButton('Save', ['class' => 'btn btn-block bg-gradient-info']) ?>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>
<?php
}
ActiveForm::end();
if(\common\models\HotelStars::find()->where(['hotel_id' => $id])->one()){
    $model = \common\models\HotelStars::find(['hotel_id' => $id])->one();
}else{
    $model = new \common\models\HotelStars();
}
$form = ActiveForm::begin([
    'action' => Yii::$app->urlManager->createUrl('admin/hotels/save-stars?id=' . $id)
]);
if(isset($_GET['id'])){
    ?>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-bold text-primary">
                    Hotel Stars
                </div>
                <div>
                    <div class="badge bg-secondary">
                        <?php
                            if(isset($model)) {
                                echo $model->rank;
                            }
                        ?>
                    </div>
                    Stars Hotel
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->field($model, 'rank')->dropDownList([
                            'prompt' => '-- Select Hotel Stars --',
                            '1' => '1 Star',
                            '2' => '2 Star',
                            '3' => '3 Star',
                            '4' => '4 Star',
                            '5' => '5 Star'
                    ]) ?>
                    <div class="float-end">
                        <?php echo Html::submitButton('Save', ['class' => 'btn btn-block bg-gradient-info']) ?>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
    <?php
}
ActiveForm::end();
if(\common\models\HotelPrices::find()->where(['id' => $id])->one()){
    $model = \common\models\HotelPrices::find(['id' => $id])->one();
}else{
    $model = new \common\models\HotelPrices();
}

$form = ActiveForm::begin([
    'action' => Yii::$app->urlManager->createUrl('admin/hotels/save-price?id=' . $id)
]);
if(isset($_GET['id'])){
    ?>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-bold text-primary">
                   Enter Room Price
                </div>
                <div>

                    <div class="badge bg-secondary">
                        <?php
                            if(isset($model)) {
                                if (isset($model->amount)) {
                                    echo 'PKR' . ' ' . $model->amount;
                                }
                            }
                            ?>
                    </div>
                   Per Room Price
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->field($model, 'amount')->textInput(['placeholder' => 'Room Price']) ?>
                    <div class="float-end">
                        <?php echo Html::submitButton('Save', ['class' => 'btn btn-block bg-gradient-info']) ?>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
    <?php
}
ActiveForm::end();
$mealOptions = ArrayHelper::map(\common\models\Meals::find()->all(), 'id', 'name');
$mealCheckboxOptions = [
    'class' => 'meals_checkbox',
];
if(isset($_GET['id'])) {
    $hotels = \common\models\Hotels::find()
        ->where(['id' => $_GET['id']])
        ->with('meals')
        ->one();
    $selectedMealIds = ArrayHelper::getColumn($hotels->meals, 'id');
    $selectedMealIds_json = json_encode($selectedMealIds);
}
$form = ActiveForm::begin();
if(isset($_GET['id'])){
    ?>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-bold text-primary">
                   Select Meals
                </div>
                <div>
                    Total Meal Provided By this hotel
                    <div class="badge bg-secondary">
                        <?php
                        $existingOrderMeal = \common\models\HotelMeal::find()
                            ->where(['hotel_id' => $id])
                            ->count();
                        echo $existingOrderMeal;
                            ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?= Html::checkboxList('meals',  null,$mealOptions, $mealCheckboxOptions); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
ActiveForm::end();

$facilityOptions = ArrayHelper::map(\common\models\Facilities::find()->all(), 'id', 'name');
$facilityCheckboxOptions = [
    'class' => 'facilities_checkbox',
];
if(isset($_GET['id'])) {
    $hotels = \common\models\Hotels::find()
        ->where(['id' => $_GET['id']])
        ->with('facilities')
        ->one();
    $selectedFacilitiesIds = ArrayHelper::getColumn($hotels->facilities, 'id');
    $selectedFacilitiesIds_json = json_encode($selectedFacilitiesIds);
}
$model = new \common\models\Facilities();

$form = ActiveForm::begin();
if(isset($_GET['id'])){
    ?>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-bold text-primary">
                   Select Facilities
                </div>
                <div>
                    Total Facilities Provided By this hotel
                    <div class="badge bg-secondary">
                        <?php
                        $existingOrderMeal = \common\models\HotelFacility::find()
                            ->where(['hotel_id' => $id])
                            ->count();
                        echo $existingOrderMeal;
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?= Html::checkboxList('meals',  null,$facilityOptions, $facilityCheckboxOptions); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
ActiveForm::end();
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK2R5PtFz5mPVVj8PmQbCNZJzwAQHD1QA&libraries=places"></script>

<script>
    // select all the checkboxes with a specific class
    var selectedMealIds_json = JSON.parse('<?php echo (isset($_GET['id'])) ? $selectedMealIds_json : ''; ?>');

    const checkboxes = document.querySelectorAll('.meals_checkbox > label > input[type="checkbox"]');

    // create a counter for the number of checked checkboxes
    let checkedCount = 0;
    //console.log(selectedMealIds_json);
    let selectedCheckboxes = [];
    const UnselectedCheckboxes = [];

    // loop through all the checkboxes
    checkboxes.forEach(function(checkbox) {
        selectedCheckboxes.push(checkbox.value);

        //console.log(selectedMealIds_json[checkedCount]);
            console.log(selectedMealIds_json[checkedCount]);
            // if the checkbox is checked, increment the counter
            if (selectedMealIds_json[0] == checkbox.value ||
                selectedMealIds_json[1] == checkbox.value ||
                selectedMealIds_json[2] == checkbox.value ||
                selectedMealIds_json[3] == checkbox.value ||
                selectedMealIds_json[4] == checkbox.value ||
                selectedMealIds_json[5] == checkbox.value ||
                selectedMealIds_json[6] == checkbox.value ||
                selectedMealIds_json[7] == checkbox.value ||
                selectedMealIds_json[8] == checkbox.value ||
                selectedMealIds_json[9] == checkbox.value)
            {
                checkbox.checked = true;
            }

        checkbox.addEventListener('change', function() {
            if (!checkbox.checked) {
                selectedCheckboxes = selectedCheckboxes.filter(item => item !== checkbox.value);
               // console.log(`Unchecked value: ${checkbox.value}`);
               // console.log(UnselectedCheckboxes.push(checkbox.value));
                //console.log(JSON.stringify(UnselectedCheckboxes));
                $.ajax({
                    url: '<?= Yii::$app->urlManager->createUrl("admin/hotels/remove-meal?id=" . $id) ?>',
                    type: "POST",
                    data: {meal_id: checkbox.value},
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }else{
                $.ajax({
                    url: '<?= Yii::$app->urlManager->createUrl("admin/hotels/save-meals?id=" . $id) ?>',
                    type: "POST",
                    data: {meal_id: checkbox.value},
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
          //  console.log(`Selected values: ${selectedCheckboxes}`);
        });
            checkedCount++;
    });
// ********************************************************************************
    // saving facilities
    // select all the checkboxes with a specific class
    var selectedFacilitiesIds_json = JSON.parse('<?php echo (isset($_GET['id'])) ? $selectedFacilitiesIds_json : ''; ?>');

    const checkboxes_fa = document.querySelectorAll('.facilities_checkbox > label > input[type="checkbox"]');

    // create a counter for the number of checked checkboxes
    let checkedCount_fa = 0;
    //console.log(selectedMealIds_json);
    let selectedCheckboxes_fa = [];
    const UnselectedCheckboxes_fa = [];

    // loop through all the checkboxes
    checkboxes_fa.forEach(function(checkbox) {
        selectedCheckboxes_fa.push(checkbox.value);

        //console.log(selectedMealIds_json[checkedCount]);
       // console.log($selectedFacilitiesIds_json[checkedCount]);
        // if the checkbox is checked, increment the counter
        if (selectedFacilitiesIds_json[0] == checkbox.value ||
            selectedFacilitiesIds_json[1] == checkbox.value ||
            selectedFacilitiesIds_json[2] == checkbox.value ||
            selectedFacilitiesIds_json[3] == checkbox.value ||
            selectedFacilitiesIds_json[4] == checkbox.value ||
            selectedFacilitiesIds_json[5] == checkbox.value ||
            selectedFacilitiesIds_json[6] == checkbox.value ||
            selectedFacilitiesIds_json[7] == checkbox.value ||
            selectedFacilitiesIds_json[8] == checkbox.value ||
            selectedFacilitiesIds_json[9] == checkbox.value ||
            selectedFacilitiesIds_json[10] == checkbox.value ||
            selectedFacilitiesIds_json[11] == checkbox.value ||
            selectedFacilitiesIds_json[12] == checkbox.value ||
            selectedFacilitiesIds_json[13] == checkbox.value ||
            selectedFacilitiesIds_json[14] == checkbox.value ||
            selectedFacilitiesIds_json[15] == checkbox.value ||
            selectedFacilitiesIds_json[16] == checkbox.value ||
            selectedFacilitiesIds_json[17] == checkbox.value ||
            selectedFacilitiesIds_json[18] == checkbox.value ||
            selectedFacilitiesIds_json[19] == checkbox.value ||
            selectedFacilitiesIds_json[20] == checkbox.value ||
            selectedFacilitiesIds_json[21] == checkbox.value ||
            selectedFacilitiesIds_json[22] == checkbox.value ||
            selectedFacilitiesIds_json[23] == checkbox.value ||
            selectedFacilitiesIds_json[24] == checkbox.value
    )
        {
            checkbox.checked = true;
        }

        checkbox.addEventListener('change', function() {
            if (!checkbox.checked) {
                selectedCheckboxes_fa = selectedCheckboxes_fa.filter(item => item !== checkbox.value);
                // console.log(`Unchecked value: ${checkbox.value}`);
                // console.log(UnselectedCheckboxes.push(checkbox.value));
                //console.log(JSON.stringify(UnselectedCheckboxes));
                $.ajax({
                    url: '<?= Yii::$app->urlManager->createUrl("admin/hotels/remove-facility?id=" . $id) ?>',
                    type: "POST",
                    data: {facility_id: checkbox.value},
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }else{
                $.ajax({
                    url: '<?= Yii::$app->urlManager->createUrl("admin/hotels/save-facility?id=" . $id) ?>',
                    type: "POST",
                    data: {facility_id: checkbox.value},
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            //  console.log(`Selected values: ${selectedCheckboxes}`);
        });
        checkedCount_fa++;
    });

</script>