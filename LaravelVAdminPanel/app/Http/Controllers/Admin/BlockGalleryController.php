<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GetGalleryField;
use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\GalleryImage;
use App\Models\GalleryTitle;
use Illuminate\Http\Request;

class BlockGalleryController extends Controller
{
    function get_all(){
        return view('admin/gallery-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => GetGalleryField::get_db_fields(),
        ]);
    }

    function edit(Request $request){

//        var_export($request->input());
        $array_fields = RequestInput::get_fields_val($request);

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
}
