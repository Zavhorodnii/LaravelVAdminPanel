<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\TextReview;
use Illuminate\Http\Request;
require_once 'Support_files/Get_fields_val.php';

class TextReviewController extends Controller
{
    public function get_all_text_review(){
        return view('admin/all-text-review-page',[
            'blocks' => TextReview::all(),
        ]);
    }

    public function create_text_review_item(){
        return view('admin/create/create-text-review-item', [
            'files' => Files::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_update(Request $request){
        $post_id = $request->input('post_id');
        if ($post_id) {
            $catalog = TextReview::find($post_id);
        } else
            $catalog = new TextReview;

        $array_fields = get_fields_val($request);

        $catalog->person_name = $array_fields['person-name'];
        $catalog->draft = $array_fields['draft'];
        $catalog->file_id = $array_fields['file-id'];
        $catalog->description = $array_fields['description'];
        $catalog->save();
//        var_export($array_fields);

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update_text_review_item', $catalog->id),
            ]);
    }

    public function open_update($id){

        $text_review = TextReview::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['person-name'] = $text_review->person_name;
        $item_fields['draft'] = $text_review->draft;
        $item_fields['description'] = $text_review->description;
        $img_path = Files::find($text_review->file_id);
        if(isset($img_path)) {
            $file = [
                'status' => 'ok',
                'id' => $text_review->file_id,
                'url' => $img_path->file_path,
            ];
        }else{
            $file = [
                'status' => 'error'
            ];
        }
        $item_fields['file-id'] = $file;

//        var_export($item_fields);

        return view('admin/edit/edit-text-review-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => $item_fields,
        ]);
    }

    public function delete(Request $request){
        TextReview::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-text-review'),
            ]);
    }

    public function change_draft(Request $request){
        $catalog = TextReview::find($request->input('id'));
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
