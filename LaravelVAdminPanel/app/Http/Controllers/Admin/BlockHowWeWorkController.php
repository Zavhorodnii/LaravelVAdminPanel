<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HowWeWork;
use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\HowWeWorkItems;
use App\Models\HowWeWorkTitle;
use Illuminate\Http\Request;

class BlockHowWeWorkController extends Controller
{
    function get_all_how_we_work(){
        return view('admin/how-we-work', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => HowWeWork::get_db_fields(),
        ]);
    }

    function edit_block_how_we_work(Request $request){
        $array_fields = RequestInput::get_fields_val($request);
        HowWeWorkTitle::query()->delete();

        $item = new HowWeWorkTitle;
        $item->title = $array_fields['title'];
        $item->save();

        HowWeWorkItems::query()->delete();
        foreach( $array_fields['repeater1'] as $fields ){
            $items = new HowWeWorkItems;
            $items->title = $fields['title'];
            $items->file_id = $fields['file-id'];
            $items->description = $fields['description'];
            $items->save();
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }
}
