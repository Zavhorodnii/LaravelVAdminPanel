<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    function get_all(){
        return view('admin/social_link-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
//            'fields' => SocialLink::all(),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);

//        var_export($array_fields);

        SocialLink::query()->delete();

//        var_export($array_fields);

        if ( is_array( $array_fields['repeater-social'] )) {
            foreach ($array_fields['repeater-social'] as $fields) {
                $items = new SocialLink;
                $items->link = $fields['link'];
                $items->file_id = $fields['file-id'];
                $items->save();
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

    function get_db_fields(){
        $all_fields = SocialLink::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
            $img_path = Files::find($items->file_id);
            if(isset($img_path)) {
                $file = [
                    'status' => 'ok',
                    'id' => $items->file_id,
                    'url' => $img_path->file_path,
                ];
            }else{
                $file = [
                    'status' => 'error'
                ];
            }

            $fields['repeater-social'][$index] = [
                'link' => $items->link,
                'file-id' => $file,
            ];

            $index++;

        }
//        var_export($fields);
        return $fields;
    }
}
