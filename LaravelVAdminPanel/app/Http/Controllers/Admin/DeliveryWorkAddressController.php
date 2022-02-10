<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GetDeliveryWorkAddress;
use App\Helpers\RequestInput;
use App\Models\DeliveryAddress;
use App\Models\DeliveryPoints;
use App\Models\Files;
use Illuminate\Http\Request;

class DeliveryWorkAddressController extends Controller
{
    function get_all(){
        return view('admin/delivery-address-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => GetDeliveryWorkAddress::get_db_fields(),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);

        DeliveryPoints::query()->delete();

//        var_export($array_fields);
        foreach( $array_fields['repeater1'] as $fields ){
            $items = new DeliveryPoints;
            $items->region = $fields['region'];
            $items->point_style = $fields['point-style'];
            $items->save();
            if( isset( $fields['repeater2'] ) ){
                if( is_array( $fields['repeater2'] ) ){
                    foreach ( $fields['repeater2'] as $field ){
                        $address = new DeliveryAddress;
                        $address->delivery_points_id = $items->id;
                        $address->address = $field['address'];
                        $address->phone = $field['phone'];
                        $address->work_time = $field['work-time'];
                        $address->save();
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
