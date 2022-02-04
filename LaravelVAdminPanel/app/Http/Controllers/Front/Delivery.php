<?php


namespace App\Http\Controllers\Front;


use App\Helpers\GetDeliveryPriceByID;
use App\Helpers\GetDeliveryWorkAddress;
use App\Helpers\GetDeliveryWorkDay;
use App\Models\DeliveryBlock;
use App\Models\DeliveryPrice;
use App\Models\DeliveryTypePay;

class Delivery extends AbstractGetBlock
{
    protected static array $fields = array();

    public static function getFields($post_id): array
    {
        self::$fields['title'] = self::getDeliveryTitle();
        $all_prices = DeliveryPrice::where('draft', '=', false)->get();
        foreach ( $all_prices as $price) {
            self::$fields['price'][] = GetDeliveryPriceByID::get_fields_by_id($price->id);
        }
        self::$fields['delivery-work-day'] = GetDeliveryWorkDay::get_db_fields();
        self::$fields['delivery-work-address'] = GetDeliveryWorkAddress::get_db_fields();

//        dd(self::$fields);

        return self::$fields;
    }

    private static function getDeliveryTitle(): array
    {
        $all_fields = DeliveryTypePay::all();
        $title_block = DeliveryBlock::all();
        $fields = array();
        $index = 1;
            $fields['title'] = $title_block[0]->title ?? null;
            $fields['subtitle'] = $title_block[0]->subtitle ?? null;
            $fields['title-type-pay'] = $title_block[0]->title_type_pay ?? null;
            $fields['title-type-delivery'] = $title_block[0]->title_type_delivery ?? null;
            $fields['title-place-delivery'] = $title_block[0]->title_place_delivery ?? null;
            $fields['title-day-delivery'] = $title_block[0]->title_day_delivery ?? null;

        foreach ($all_fields as $items){
            $fields['type-pay-title'][] = [
                'title' => $items->title,
            ];
            $index++;
        }
        return $fields;
    }
}
