<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\TextBlock;
use Illuminate\Http\Request;

class TextBlockController extends Controller
{
    public function get_all_text_block(){
        return view('admin/all-text-block-page',[
            'blocks' => TextBlock::all(),
//            'blocks' => [],
        ]);
    }

    public function create_text_block_item(){
        return view('admin/create/create-catalog-item', [
            'files' => Files::orderBy('id', 'DESC')->get(),
//            'fields' => $this->get_db_fields(),
        ]);
    }

    public function update($id){

        $catalog = TextBlock::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['title'] = $catalog->title;
        $item_fields['description'] = $catalog->description;
        $item_fields['draft'] = $catalog->draft;

//        var_export($item_fields);

        return view('admin/edit/edit-catalog-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => $item_fields,
        ]);
    }

    public function create(Request $request){
//        var_export($request->input());

        $post_id = $request->input('post_id');
        if ($post_id) {
            $catalog = TextBlock::find($post_id);
        } else
            $catalog = new TextBlock;

        $array_fields = get_fields_val($request);

        $catalog->title = $array_fields['title'];
        $catalog->description = $array_fields['description'];
        $catalog->draft = $array_fields['draft'];
        $catalog->save();
//        var_export($array_fields);

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update_catalog_item', $catalog->id),
            ]);
    }

    public function delete(Request $request){
        TextBlock::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-catalog-page'),
            ]);
    }

    public function change_draft(Request $request){
        $catalog = TextBlock::find($request->input('id'));
        $status = 'error';
        if($catalog){
            $catalog->draft = $request->input('status');
            $catalog->save();
            $status = 'ok';
        }
        return response()
            ->json([
                'status'    => $status,
            ]);
    }
}
