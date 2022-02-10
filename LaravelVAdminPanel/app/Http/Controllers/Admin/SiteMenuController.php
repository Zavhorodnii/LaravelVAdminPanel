<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CreateMenuStruct;
use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\SiteMenu;
use Illuminate\Http\Request;

class SiteMenuController extends Controller
{
    function get_all(){
        $site = SiteMenu::all();
        return view('admin/site_menu-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
//            'fields' => $this->get_db_fields(),
            'fields' => CreateMenuStruct::create_menu_struct($site, []),
        ]);
    }

    function edit(Request $request){

        $array_fields = RequestInput::get_fields_val($request);
        SiteMenu::query()->delete();

        if(isset( $array_fields['repeater-menu-l1'] )) {
            foreach ($array_fields['repeater-menu-l1'] as $fields) {
                $items = new SiteMenu;
                $items->title = $fields['title'];
                $items->url = $fields['url'];
                $items->save();

                if (isset($fields['repeater-menu-l2'])) {
                    if (is_array($fields['repeater-menu-l2'])) {
                        foreach ($fields['repeater-menu-l2'] as $field) {
                            $items2 = new SiteMenu;
                            $items2->title = $field['title'];
                            $items2->url = $field['url'];
                            $items2->site_menus_id = $items->id;
                            $items2->save();

                            if (isset($field['repeater-menu-l3'])) {
                                if (is_array($field['repeater-menu-l3'])) {
                                    foreach ($field['repeater-menu-l3'] as $item) {
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
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }
}
