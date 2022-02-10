<?php


namespace App\Helpers;


use App\Models\DeliveryWorkDay;
use App\Models\DeliveryWorkRegion;

class GetDeliveryWorkDay
{
    public static function get_db_fields() : array
    {
        $all_fields = DeliveryWorkRegion::all();
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
            $fields['repeater1'][$index] = [
                'region' => $items->region,
                'id-for-select' => $items->id_for_select,
            ];
            $index++;
        }
        $all_fields = DeliveryWorkDay::all();
        $index = 1;
        foreach ($all_fields as $items){
            $fields['repeater2'][$index] = [
                'delivery-region-title' => $items->delivery_region_title,
                'id-select' => $items->id_select,
                'monday' => $items->monday,
                'tuesday' => $items->tuesday,
                'wednesday' => $items->wednesday,
                'thursday' => $items->thursday,
                'friday' => $items->friday,
                'saturday' => $items->saturday,
                'sunday' => $items->sunday,
            ];
            $index++;
        }
        return $fields;
    }
}
