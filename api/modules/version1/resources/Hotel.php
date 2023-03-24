<?php

namespace api\modules\version1\resources;

use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * @author Farhad Haider
 */
class Hotel extends \common\models\Hotels implements Linkable
{
    public function extraFields()
    {
        return ['hotelImages','hotelRooms','hotelStars','hotelViews','meals','facilities','hotelPrices'];
    }
    /**
     * Returns a list of links.
     *
     * @return array the links
     */
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['hotel/view', 'id' => $this->id], true)
        ];
    }

}

