<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\ReturnBlocks;
use App\Models\ReturnItem;
use Illuminate\Http\Request;

class BlockReturnController extends Controller
{
    public function get_all_return(){
        return view('admin/all-return-page');
    }

    public function create_return_block(){
        return view('admin/create-return-block', [
            'files' => Files::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_return_item(Request $request){
        $all_fields = $request->input();
//        var_export($all_fields);
        $return_block = new ReturnBlocks;
        $return_block->draft = $request->input('draft');
        $return_block->post_title = $request->input('post_title');
        $return_block->save();
        foreach ($all_fields as $name_field => $value){
            if($name_field == 'post_title' || $name_field == 'draft')
                continue;

            $return_item = new ReturnItem;
            $return_item->return_block_id = $return_block->id;
            $return_item->field_name = $name_field;
            $return_item->field_data = $value;

            $return_item->save();
        }
        return response()
            ->json([
                'status'    => 'ok',
                'url'       => $return_block->id,
            ]);
    }

}
