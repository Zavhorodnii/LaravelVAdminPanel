<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Gift;
use App\Models\Gift_price;
use App\Models\Gift_product;
use App\Models\Products;
use Illuminate\Http\Request;

require_once 'Support_files/Get_fields_val.php';

class BlockGiftsController extends Controller
{
    public function get_all(){
        return view('admin/gift-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
            'all_products' => Products::select('id', 'title')->where('draft', '=', false)->orderBy('id', 'DESC')->get(),
        ]);
    }

//    public function create_page(){
//        return view('admin/create/create-bestseller-item',[
//            'files' => Files::orderBy('id', 'DESC')->get(),
//            'all_products' => Products::select('id', 'title')->where('draft', '=', false)->orderBy('id', 'DESC')->get(),
//        ]);
//    }

    public function create(Request $request){
        Gift::query()->delete();

        $array_fields = get_fields_val($request);
//        var_export($array_fields);
//        return

        $gift = new Gift;

        $gift->title = $array_fields['title'];
        $gift->date_finish = $array_fields['date-finish'];

        $gift->save();

        if( isset( $array_fields['repeater-price'] ) && is_array( $array_fields['repeater-price'] ) &&
            count( $array_fields['repeater-price'] ) > 0) {
            foreach ($array_fields['repeater-price'] as $value) {
                if (isset($value)) {
                    $gift_price = new Gift_price;
                    $gift_price->gifts_id = $gift->id;
                    $gift_price->price = $value['price'];
                    $gift_price->save();

                    if( isset( $value['repeater-product'] ) && is_array( $value['repeater-product'] ) &&
                        count( $value['repeater-product'] ) > 0) {
                        foreach ($value['repeater-product'] as $item) {
                            if (isset($item)) {
                                $gift_product = new Gift_product;
                                $gift_product->gift_prices_id = $gift_price->id;
                                $gift_product->products_id = $item['product-id'];
                                $gift_product->save();
                            }
                        }
                    }
                }
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);

    }

    function get_db_fields(){
        $gift = Gift::all();
//        var_export($all_fields);
        $fields = array();
        if ( isset($gift) ) {
//            $fields['title'] = $gift[0]->title;
//            $fields['date-finish'] = $gift[0]->date_finish;
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
