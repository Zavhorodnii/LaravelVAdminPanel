<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GetDeliveryPriceByID;
use App\Helpers\RequestInput;
use App\Models\DeliveryAllCity;
use App\Models\DeliveryPrice;
use App\Models\DeliveryPriceItems;
use App\Models\Files;
use Illuminate\Http\Request;

class DeliveryPriceController extends Controller
{
    public function get_all_delivery_price(){
        return view('admin/all-delivery-price-page',[
            'blocks' => DeliveryPrice::all(),
//            'blocks' => [],
        ]);
    }

    public function create_delivery_price_item(){
        return view('admin/create/create-delivery-price-item', [
            'files' => Files::orderBy('id', 'DESC')->get(),
//            'fields' => $this->get_db_fields(),
        ]);
    }

    public function open_update($id){

        return view('admin/edit/edit-delivery-price-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => GetDeliveryPriceByID::get_fields_by_id($id),
        ]);
    }

    public function create(Request $request){
//        var_export($request->input());

        $post_id = $request->input('post_id');
        if ($post_id) {
            $item_price = DeliveryPrice::find($post_id);
            DeliveryAllCity::where('delivery_prices_id', '=', $post_id)->delete();
        } else
            $item_price = new DeliveryPrice;

        $array_fields = RequestInput::get_fields_val($request);
//        var_export($array_fields);

        $item_price->title_repeater = $array_fields['repeater-title'];
        $item_price->title = $array_fields['title'];
        $item_price->subtitle = $array_fields['subtitle'];
        $item_price->draft = $array_fields['draft'];
        $item_price->important_info = $array_fields['important-info'];
        $item_price->save();
        if( isset( $array_fields['repeater1'] ) && is_array( $array_fields['repeater1'] ) &&
            count( $array_fields['repeater1'] ) > 0) {
            foreach ($array_fields['repeater1'] as $value) {
                $all_city = new DeliveryAllCity;
                $all_city->delivery_prices_id = $item_price->id;
                $all_city->cities = $value['cities'];
                $all_city->save();
                if( isset( $value['repeater2'] ) && is_array( $value['repeater2'] ) &&
                    count( $value['repeater2'] ) > 0) {
                    foreach ($value['repeater2'] as $price) {
                        $price_item = new DeliveryPriceItems();
                        $price_item->delivery_all_cities_id = $all_city->id;
                        $price_item->weight_from = $price['weight-from'];
                        $price_item->weight_to = $price['weight-to'];
                        $price_item->price = $price['price'];
                        $price_item->save();

                    }
                }
            }
        }
//        var_export($array_fields);

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update-delivery-price-item', $item_price->id),
            ]);
    }

    public function delete(Request $request){
        DeliveryPrice::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-delivery-price-page'),
            ]);
    }

    public function change_draft(Request $request){
        $item = DeliveryPrice::find($request->input('id'));
        $status = 'error';
        if($item){
            $item->draft = $request->input('status');
            $item->save();
            $status = 'ok';
        }
        return response()
            ->json([
                'status'    => $status,
            ]);
    }
}
