<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\GalleryImage;
use App\Models\GalleryTitle;
use Illuminate\Http\Request;
require_once 'Support_files/Get_fields_val.php';

class BlockGalleryController extends Controller
{
    function get_all(){
        return view('admin/gallery-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = get_fields_val($request);

        GalleryTitle::query()->delete();

//        var_export($array_fields);
        $item = new GalleryTitle;
        $item->title = $array_fields['title'];
        $item->description = $array_fields['description'];
        $item->save();

        GalleryImage::query()->delete();
        foreach( $array_fields['repeater1'] as $fields ){
            $items = new GalleryImage;
            $items->file_id = $fields['file-id'];
            $items->save();
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

    function get_db_fields(){
        $all_fields = GalleryImage::all();
        $title_block = GalleryTitle::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
//        var_export($title_block[0]->title);
        if(isset($title_block[0])) {
            $fields['title'] = $title_block[0]->title;
            $fields['description'] = $title_block[0]->description;
        }
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
                'file-id' => $file,
            ];
            $index++;
        }
        return $fields;
    }
}
