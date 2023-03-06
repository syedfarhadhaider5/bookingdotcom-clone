<?php
/* @var $this yii\web\View */
/* @var $hotels common\models\Hotels */
?>
<div class="card">
    <div class="card-body custom-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl('user/index'); ?>">Hotels</a></li>
            </ol>
        </nav>
    </div>
</div>

        <section class="content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example2" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Facilities</th>
                                <th>Meals</th>
                                <th>Rooms</th>
                                <th>Stars</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                    foreach ($hotels as $hotel){
                            ?>
                            <tr>
                                <td>
                                    <div class="d-flex flex-column flex-wrap">
                                    <?php
                                    foreach ($hotel->getHotelImages()->all() as $image){
                                        if(isset($image->image_path)){
                                            ?>
                                            <img src="<?= $image->image_path ?>" class="img img-responsive rounded-1 pointer-event" width="70px" height="70px">
                                            <?php
                                        }
                                    }
                                    if(!$hotel->getHotelImages()->one()){
                                        ?>
                                        <img src="https://www.gynprog.com.br/wp-content/uploads/2017/06/wood-blog-placeholder.jpg" class="img img-responsive rounded-1 pointer-event" width="70px" height="70px">
                                        <?php
                                    }
                                    echo "<div class='text-bold hotelName'>";
                                        echo  $hotel->name;
                                    echo "</div>";
                                    ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge bg-success">
                                        <?=  $hotel->getTotalFacilities(); ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="badge bg-success">
                                        <?=  $hotel->getTotalHotelMeals(); ?>
                                    </div>
                                </td>
                                <td>
                                        <?php
                                            foreach ($hotel->getHotelRooms()->all() as $room){
                                               if(isset($room->total)){
                                                   echo '<div class="badge bg-success">';
                                                   echo $room->total;
                                                   echo '</div>';
                                               }
                                            }
                                            if(!$hotel->getHotelRooms()->one()){
                                                echo '<div class="badge bg-success">';
                                                echo "0";
                                                echo '</div>';
                                            }
                                            ?>
                                </td>
                                <td>
                                        <?php
                                            foreach ($hotel->getHotelStars()->all() as $room) {
                                                if (isset($room->rank)) {
                                                    echo '<div class="badge bg-warning">';
                                                    if($room->rank == 1) {
                                                        echo $room->rank . ' ';
                                                        echo '<i class="fa fa-star"></i>';
                                                    }elseif($room->rank == 2){
                                                        echo $room->rank . ' ';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                    }
                                                    elseif($room->rank == 3){
                                                        echo $room->rank . ' ';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                    }
                                                    elseif($room->rank == 4){
                                                        echo $room->rank . ' ';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                    }
                                                    elseif($room->rank == 5){
                                                        echo $room->rank . ' ';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                        echo '<i class="fa fa-star"></i>';
                                                    }
                                                    echo '</div>';
                                                }
                                            }
                                        if(!$hotel->getHotelStars()->one()){
                                            echo '<div class="badge bg-warning">';
                                            echo "Not rating yet";
                                            echo '</div>';
                                        }
                                        ?>
                                </td>
                                <td>
                                    <?php
                                    foreach ($hotel->getHotelPrices()->all() as $price) {
                                        if (isset($price->amount)) {
                                            echo '<div class="d-flex flex-column justify-content-center">';
                                            echo '<span>Per Room</span>';
                                            echo "<div><span class='text-bold'>PKR:</span>" . " " . '<span class=" text-primary">' .$price->amount . '</span></div>';
                                            echo '</div>';
                                        }
                                    }
                                    if(!$hotel->getHotelPrices()->one()){
                                        echo '<div class="d-flex flex-column justify-content-center">';
                                        echo '<span>Per Room</span>';
                                        echo "<div><span class='text-bold'>PKR:</span>" . " " . '<span class=" text-primary">' .'0'. '</span></div>';
                                        echo '</div>';                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= Yii::$app->urlManager->createUrl('admin/hotels/update?id=' . $hotel->id) ?>">
                                        <button type="button" class="btn btn-xs bg-gradient-success">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= Yii::$app->urlManager->createUrl('admin/hotels/remove?id=' . $hotel->id) ?>">
                                        <button type="button" class="btn btn-xs  bg-gradient-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
<style>
    .hotelName{
        font-size: 12px !important;
    }
</style>
