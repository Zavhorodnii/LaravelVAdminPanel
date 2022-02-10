<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GiftFields;
use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\Gift;
use App\Models\Gift_price;
use App\Models\Gift_product;
use App\Models\Products;
use Illuminate\Http\Request;

class BlockGiftsController extends Controller
{
    public function get_all(){
        return view('admin/gift-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => GiftFields::get_db_fields(),
            'all_products' => Products::select('id', 'title')->where('draft', '=', false)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create(Request $request){
        Gift::query()->delete();

        $array_fields = RequestInput::get_fields_val($request);
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
}
