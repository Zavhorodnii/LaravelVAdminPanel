<?php


namespace App\Helpers;


use App\Models\DeliveryAddress;
use App\Models\DeliveryPoints;

class GetDeliveryWorkAddress
{
    public static function get_db_fields() : array
    {
        $all_fields = DeliveryPoints::all();
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
            $fields['repeater1'][$index] = [
                'region' => $items->region,
                'point-style' => $items->point_style,
            ];
            $index2 = 1;
            $address = DeliveryAddress::where('delivery_points_id', '=', $items->id)->get();;
            foreach ($address as $address_){
                $fields['repeater1'][$index]['repeater2'][$index2] = [
                    'address' => $address_->address,
                    'phone' => $address_->phone,
                    'work-time' => $address_->work_time,
                ];
                $index2++;
            }
            $index++;
        }
        return $fields;
    }
}
