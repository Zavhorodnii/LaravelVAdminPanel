<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\VideoReview;
use Illuminate\Http\Request;

require_once 'Support_files/Get_fields_val.php';

class VideoReviewController extends Controller
{
    public function get_all_video_review(){
        return view('admin/all-video-review-page',[
            'blocks' => VideoReview::all(),
        ]);
    }

    public function create_video_review_item(){
        return view('admin/create/create-video-review-item', [
            'files' => Files::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_update(Request $request){
        $post_id = $request->input('post_id');
        if ($post_id) {
            $items = VideoReview::find($post_id);
        } else
            $items = new VideoReview;

        $array_fields = get_fields_val($request);

        $items->person_name = $array_fields['person-name'];
        $items->draft = $array_fields['draft'];
        $items->video_url = $array_fields['video-url'];
        $items->review = $array_fields['review'];
        $items->save();
//        var_export($array_fields);

        return response()
            ->json([
                'status'    => 'ok',
                'url'       =>  route('update_video_review_item', $items->id),
            ]);
    }

    public function open_update($id){

        $items = VideoReview::find($id);
        $item_fields['post_id'] = $id;
        $item_fields['person-name'] = $items->person_name;
        $item_fields['draft'] = $items->draft;
        $item_fields['review'] = $items->review;
        $item_fields['video-url'] = $items->video_url;

//        var_export($item_fields);

        return view('admin/edit/edit-video-review-item', [
            'files'     => Files::orderBy('id', 'DESC')->get(),
            'fields'    => $item_fields,
        ]);
    }

    public function delete(Request $request){
        VideoReview::find($request->input('post_id'))->delete();
        return response()
            ->json([
                'status' => 'ok',
                'url'    => route('all-video-review'),
            ]);
    }

    public function change_draft(Request $request){
        $items = VideoReview::find($request->input('id'));
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
