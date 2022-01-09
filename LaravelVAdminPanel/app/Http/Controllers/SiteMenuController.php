<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\SiteMenu;
use Illuminate\Http\Request;

require_once 'Support_files/Get_fields_val.php';

class SiteMenuController extends Controller
{
    function get_all(){
        $site = SiteMenu::all();
        return view('admin/site_menu-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
//            'fields' => $this->get_db_fields(),
            'fields' => create_menu_struct($site, []),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = get_fields_val($request);

//        var_export($array_fields);

        SiteMenu::query()->delete();

//        var_export($array_fields);
        foreach( $array_fields['repeater-menu-l1'] as $fields ){
            $items = new SiteMenu;
            $items->title = $fields['title'];
            $items->url = $fields['url'];
            $items->save();

            if( isset( $fields['repeater-menu-l2'] ) ){
                if( is_array( $fields['repeater-menu-l2'] ) ){
                    foreach ( $fields['repeater-menu-l2'] as $field ){
                        $items2 = new SiteMenu;
                        $items2->title = $field['title'];
                        $items2->url = $field['url'];
                        $items2->site_menus_id = $items->id;
                        $items2->save();

                        if( isset( $field['repeater-menu-l3'] ) ){
                            if( is_array( $field['repeater-menu-l3'] ) ){
                                foreach ( $field['repeater-menu-l3'] as $item ){
                                    $items3 = new SiteMenu;
                                    $items3->title = $item['title'];
                                    $items3->url = $item['url'];
                                    $items3->site_menus_id = $items2->id;
                                    $items3->save();
                                }
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
        $all_fields = DeliveryPoints::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
            $fields['repeater1'][$index] = [
                'region' => $items->region,
                'point-style' => $items->point_style,
            ];
            $index2 = 1;
            $address = DeliveryAddress::where('delivery_points_id', '=', $items->id)->get();;
            foreach ($address as $address_){
                $fields['repeater1'][$index]['repeater2'][$index2] = [
                    'address' => $address_->address,
                    'phone' => $address_->phone,
                    'work-time' => $address_->work_time,
                ];
                $index2++;
            }
            $index++;
        }
//        var_export($fields);
        return $fields;
    }
}
