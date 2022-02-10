<?php


namespace App\Helpers;


use App\Models\DeliveryAllCity;
use App\Models\DeliveryPrice;
use App\Models\DeliveryPriceItems;

class GetDeliveryPriceByID
{
    public static function get_fields_by_id($id) : array
    {
        $del_price = DeliveryPrice::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['repeater-title'] = $del_price->title_repeater;
        $item_fields['title'] = $del_price->title;
        $item_fields['draft'] = $del_price->draft;
        $item_fields['subtitle'] = $del_price->subtitle;
        $item_fields['important-info'] = $del_price->important_info;

        $cities = DeliveryAllCity::where('delivery_prices_id', '=', $id)->get();;

        $index1 = 1;
        foreach ($cities as $city){
            $item_fields['repeater1'][$index1] = [
                'cities' => $city->cities,
            ];
            $prices = DeliveryPriceItems::where('delivery_all_cities_id', '=', $city->id)->get();;
            $item_fields['min_price'] = DeliveryPriceItems::where('delivery_all_cities_id', '=', $city->id)->min('price');
            $index2 = 1;
            foreach ($prices as $price){
                $item_fields['repeater1'][$index1]['repeater2'][$index2] = [
                    'weight-from' => $price->weight_from,
                    'weight-to' => $price->weight_to,
                    'price' => $price->price,
                ];
                $index2++;

            }

            $index1++;
        }
        return $item_fields;
    }
}
