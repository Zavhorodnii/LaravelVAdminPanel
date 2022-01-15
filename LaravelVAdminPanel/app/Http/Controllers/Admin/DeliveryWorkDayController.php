<?php

namespace App\Http\Controllers\Admin;

use App\Models\DeliveryWorkDay;
use App\Models\DeliveryWorkRegion;
use App\Models\Files;
use Illuminate\Http\Request;
require_once 'Support_files/Get_fields_val.php';

class DeliveryWorkDayController extends Controller
{
    function get_all_delivery_day(){
        return view('admin/delivery-day-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = get_fields_val($request);

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

    function get_db_fields(){
        $all_fields = DeliveryWorkRegion::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
            $fields['repeater1'][$index] = [
                'region' => $items->region,
                'id-for-select' => $items->id_for_select,
            ];
            $index++;
        }
        $all_fields = DeliveryWorkDay::all();
        $index = 1;
        foreach ($all_fields as $items){
            $fields['repeater2'][$index] = [
                'delivery-region-title' => $items->delivery_region_title,
                'id-select' => $items->id_select,
                'monday' => $items->monday,
                'tuesday' => $items->tuesday,
                'wednesday' => $items->wednesday,
                'thursday' => $items->thursday,
                'friday' => $items->friday,
                'saturday' => $items->saturday,
                'sunday' => $items->sunday,
            ];
            $index++;
        }
        return $fields;
    }
}
