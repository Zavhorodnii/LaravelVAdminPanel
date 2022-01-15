<?php

namespace App\Http\Controllers\Admin;

use App\Models\Files;
use App\Models\HowWeWorkItems;
use App\Models\HowWeWorkTitle;
use Illuminate\Http\Request;
require_once 'Support_files/Get_fields_val.php';

class BlockHowWeWorkController extends Controller
{
    function get_all_how_we_work(){
        return view('admin/how-we-work', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
        ]);
    }

    function edit_block_how_we_work(Request $request){

//        var_export($request->input());
        $array_fields = get_fields_val($request);

        HowWeWorkTitle::query()->delete();

//        var_export($array_fields);
        $item = new HowWeWorkTitle;
        $item->title = $array_fields['title'];
        $item->save();

        HowWeWorkItems::query()->delete();
        foreach( $array_fields['repeater1'] as $fields ){
//            var_export($fields);
//            if( is_array($fields) )
//                foreach ( $fields as $key=>$value) {
            $items = new HowWeWorkItems;
            $items->title = $fields['title'];
            $items->file_id = $fields['file-id'];
            $items->description = $fields['description'];
            $items->save();
//                }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

    function get_db_fields(){
        $all_fields = HowWeWorkItems::all();
        $title_block = HowWeWorkTitle::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
//        var_export($title_block[0]->title);
        if(isset($title_block))
            $fields['title'] = $title_block[0]->title;
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
            $fields[$index] = [
                'title' => $items->title,
                'file-id' => $file,
                'description' => $items->description,
            ];
            $index++;
        }
        return $fields;
    }
}
