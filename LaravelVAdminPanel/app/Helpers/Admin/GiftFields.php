<?php


namespace App\Helpers;


use App\Models\Gift;
use App\Models\Gift_price;
use App\Models\Gift_product;
use App\Models\Products;

class GiftFields
{
    public static function get_db_fields(): array
    {
        $gift = Gift::all();
        $fields = array();
        if ( isset($gift) ) {
            $index = 1;
            foreach ($gift as $item) {
                $fields['title'] = $item->title;
                $fields['date-finish'] = $item->date_finish;
                $all_fields_price = Gift_price::where('gifts_id', '=', $item->id)->get();
                if (isset($all_fields_price)) {
                    foreach ($all_fields_price as $price) {
                        $fields['repeater-price'][$index] = [
                            'price' => $price->price,
                        ];
                        $all_gift_product = Gift_product::where('gift_prices_id', '=', $price->id)->get();
                        $index2 = 1;
                        if (isset($all_gift_product)) {
                            foreach ($all_gift_product as $gift_product) {
                                $product = Products::where('id', '=', $gift_product->products_id)->get();
                                $fields['repeater-price'][$index]['repeater-product'][$index2] = [
                                    'title' => $product[0]->title,
                                    'id' => $product[0]->id,
                                ];
                                $index2++;
                            }
                        }
                        $index++;
                    }
                }
                $index++;
            }
        }
        return $fields;
    }
}
