<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\ReturnBlocks;
use App\Models\ReturnItem;
use Illuminate\Http\Request;

class BlockReturnController extends Controller
{
    public function get_all_return(){
        return view('admin/all-return-page',[
            'blocks' => ReturnBlocks::all()
        ]);
    }

    public function create_return_block(){
        return view('admin/create/create-return-block', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => array(),
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
//        echo route('edit-return-block') . $return_block->id;
        return response()
            ->json([
                'status'    => 'ok',
                'url'       => route('edit-return-block',$return_block->id),
            ]);
//        return redirect()->route('edit-return-block',$return_block->id);
    }

    public function edit_return_item($id){
        $all_fields = ReturnItem::where('return_block_id', '=', $id)->get();
        $block_field = ReturnBlocks::find($id);
        $return_item_page = array(
            'post_title' => $block_field->post_title,
            'draft'     => $block_field->draft,
        );

        foreach ($all_fields as $fields){
            $return_item_page = $this->create_fields_array(explode('_', $fields->field_name), $fields->field_data, $return_item_page);
        }
        return view('admin/edit/edit-return-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => $return_item_page,
        ]);
    }

    protected function create_fields_array($fields, $value, &$return_item_page, $get_image_info = false){
        if(count($fields) != 0 ){
            if(strpos(strval($fields[0]), 'imageField') != ''){
                $get_image_info = true;
            }
            $return_item_page[$fields[0]] =
                $this->create_fields_array( array_slice($fields, 1), $value,$return_item_page[$fields[0]], $get_image_info);
           return $return_item_page;
        } else{
            if($get_image_info){
                $img_path = Files::find($value);
                if(isset($img_path)) {
                    return [
                        'status' => 'ok',
                        'id' => $value,
                        'url' => $img_path->file_path,
                    ];
                }else{
                    return [
                        'status' => 'error'
                    ];
                }
            }
            return $value;
        }
    }

    public function update_return_item(Request $request){
        $all_fields = $request->input();
//        var_export($all_fields);
//        echo 'post id = ' . $request->input('post_id');
        $return_block = ReturnBlocks::find($request->input('post_id'));
        $return_block->draft = $request->input('draft');
        $return_block->post_title = $request->input('post_title');
        $return_block->save();
        ReturnItem::where('return_block_id', '=', $return_block->id)->delete();
        foreach ($all_fields as $name_field => $value){
            if($name_field == 'post_title' || $name_field == 'draft'|| $name_field == 'post_id')
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

    public function delete_return_item(Request $request){
        ReturnBlocks::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status'    => 'ok',
                'url'       => route('all-return-page'),
            ]);
    }

    public function change_draft_return_item(Request $request){
        $post = ReturnBlocks::find($request->input('post_id'));
        $post->draft = $request->input('draft');
        $post->save();
        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

}
