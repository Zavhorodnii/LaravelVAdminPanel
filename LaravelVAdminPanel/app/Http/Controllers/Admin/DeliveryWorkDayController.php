<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GetDeliveryWorkDay;
use App\Helpers\RequestInput;
use App\Models\DeliveryWorkDay;
use App\Models\DeliveryWorkRegion;
use App\Models\Files;
use Illuminate\Http\Request;

class DeliveryWorkDayController extends Controller
{
    function get_all_delivery_day(){
        return view('admin/delivery-day-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => GetDeliveryWorkDay::get_db_fields(),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);

        DeliveryWorkRegion::query()->delete();

//        var_export($array_fields);

        if( is_array($array_fields['repeater1']) )
            foreach( $array_fields['repeater1'] as $fields ){
                    $delivery_region = new DeliveryWorkRegion;
                    $delivery_region->region = $fields['region'];
                    $delivery_region->id_for_select = $fields['id-for-select'];
                    $delivery_region->save();
            }
        DeliveryWorkDay::query()->delete();
        if( is_array($array_fields['repeater2']) )
            foreach( $array_fields['repeater2'] as $fields ){
//                var_export( $fields );
                $delivery_day = new DeliveryWorkDay;
                $delivery_day->delivery_region_title = $fields['delivery-region-title'];
                $delivery_day->id_select = $fields['id-select'];
                $delivery_day->monday = $fields['monday'];
                $delivery_day->tuesday = $fields['tuesday'];
                $delivery_day->wednesday = $fields['wednesday'];
                $delivery_day->thursday = $fields['thursday'];
                $delivery_day->friday = $fields['friday'];
                $delivery_day->saturday = $fields['saturday'];
                $delivery_day->sunday = $fields['sunday'];
                $delivery_day->save();
            }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }
}
