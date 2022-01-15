<?php

namespace App\Http\Controllers\Admin;

use App\Models\AudioReview;
use App\Models\Files;
use Illuminate\Http\Request;
require_once 'Support_files/Get_fields_val.php';

class AudioReviewController extends Controller
{
    public function get_all_audio_review(){
        return view('admin/all-audio-review-page',[
            'blocks' => AudioReview::all(),
        ]);
    }

    public function create_audio_review_item(){
        return view('admin/create/create-audio-review-item', [
            'files' => Files::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_update(Request $request){
        $post_id = $request->input('post_id');
        if ($post_id) {
            $items = AudioReview::find($post_id);
        } else
            $items = new AudioReview;

        $array_fields = get_fields_val($request);

        $items->person_name = $array_fields['person-name'];
        $items->draft = $array_fields['draft'];
        $items->city = $array_fields['city'];
        $items->file_id = $array_fields['file-id'];
        $items->review = $array_fields['review'];
        $items->save();
//        var_export($array_fields);

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update-audio-review-item', $items->id),
            ]);
    }

    public function open_update($id){

        $items = AudioReview::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['person-name'] = $items->person_name;
        $item_fields['draft']       = $items->draft;
        $item_fields['city']        = $items->city;
        $item_fields['review'] = $items->review;
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
        $item_fields['file-id'] = $file;

//        var_export($item_fields);

        return view('admin/edit/edit-audio-review-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => $item_fields,
        ]);
    }

    public function delete(Request $request){
        AudioReview::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-audio-review'),
            ]);
    }

    public function change_draft(Request $request){
        $items = AudioReview::find($request->input('id'));
        $status = 'error';
        if($items){
            $items->draft = $request->input('status');
            $items->save();
            $status = 'ok';
        }
        return response()
            ->json([
                'status'    => $status,
            ]);
    }
}
