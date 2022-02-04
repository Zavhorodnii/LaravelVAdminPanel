<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\DeliveryBlock;
use App\Models\DeliveryTypePay;
use App\Models\Files;
use Illuminate\Http\Request;

class BlockDeliveryController extends Controller
{
    function get_all_delivery_block(){
        return view('admin/delivery-block-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
        ]);
    }

    function edit_delivery_block(Request $request){

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);

        DeliveryBlock::query()->delete();

//        var_export($array_fields);
        $item = new DeliveryBlock;
        $item->title = $array_fields['title'];
        $item->subtitle = $array_fields['subtitle'];
        $item->title_type_pay = $array_fields['title-type-pay'];
        $item->title_type_delivery = $array_fields['title-type-delivery'];
        $item->title_place_delivery = $array_fields['title-place-delivery'];
        $item->title_day_delivery = $array_fields['title-day-delivery'];
        $item->save();

        DeliveryTypePay::query()->delete();
        foreach( $array_fields['repeater1'] as $fields ){
//            var_export($fields);
//            if( is_array($fields) )
//                foreach ( $fields as $key=>$value) {
            $items = new DeliveryTypePay;
            $items->title = $fields['title'];
            $items->save();
//                }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

    function get_db_fields(){
        $all_fields = DeliveryTypePay::all();
        $title_block = DeliveryBlock::all();
        $fields = array();
        $index = 1;
        if(isset($title_block[0]))
            $fields['title'] = $title_block[0]->title;
        if(isset($title_block[0]))
            $fields['subtitle'] = $title_block[0]->subtitle;
        if(isset($title_block[0]))
            $fields['title-type-pay'] = $title_block[0]->title_type_pay;
        if(isset($title_block[0]))
            $fields['title-type-delivery'] = $title_block[0]->title_type_delivery;
        if(isset($title_block[0]))
            $fields['title-place-delivery'] = $title_block[0]->title_place_delivery;
        if(isset($title_block[0]))
            $fields['title-day-delivery'] = $title_block[0]->title_day_delivery;

        foreach ($all_fields as $items){

            $fields[$index] = [
                'title' => $items->title,
            ];
            $index++;
        }
        return $fields;
    }
}
