<?php

namespace App\Http\Controllers\FrontControllers;

use App\Helpers\Notification;
use App\Http\Controllers\Admin\Controller;
use App\Models\AudioReview;
use App\Models\Files;
use App\Models\TextReview;
use App\Models\VideoReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddReviewController extends Controller
{
    public function set_review(Request $request)    {

        $file_count = intval($request->input('file_count'));
        $form_name = $request->input('name') ?? null;
        $form_phone = $request->input('phone') ?? null;
        $form_review = $request->input('mess') ?? null;
        $form_link = $request->input('link') ?? null;
        $form_email = $request->input('email') ?? null;
        if( $file_count > 0 ){
            $index = 0;

            if($request->file()) {
                while ($index < $file_count){

                    $file = new Files;
                    $name = time() . '_' . $request->file('file_' . $index)->getClientOriginalName();
                    $file_path = $request->file('file_' . $index)->storeAs('uploads/' .
                        date('Y') . '/' . date('m'), $name, 'public');

                    $file->name = $name;
                    $file->file_path = Storage::url($file_path);
                    $file->save();
                    $file_id = $file->id;

                    $fileMimeType = $request->file('file_' . $index)->getMimeType();
                    $typeFile = explode('/', $fileMimeType);

                    if ( $typeFile[0] == 'audio' ){
                        $audio_review = new AudioReview;
                        $audio_review->person_name = $form_name;
                        $audio_review->draft = true;
                        $audio_review->city = '';
                        $audio_review->file_id = $file_id;
                        $audio_review->review = $form_review;
                        $audio_review->save();
                        $id = Notification::addNotification('review', 'New audio review', route('update-audio-review-item', $audio_review->id));
                    }
                    elseif ( $typeFile[0] == 'image' ){
                        $text_review = new TextReview;
                        $text_review->person_name = $form_name;
                        $text_review->draft = true;
                        $text_review->file_id = $file_id;
                        $text_review->description = $form_review;
                        $text_review->save();
                        $id = Notification::addNotification('review', 'New text review', route('update_text_review_item', $text_review->id));
                    }

                    $index++;
                }
            }
            if ( $request->input('link') != ''  ){
                $video_review = new VideoReview;
                $video_review->draft = true;
                $video_review->person_name = $form_name;
                $video_review->video_url = $form_link;
                $video_review->review = $form_review;
                $video_review->save();
                $id = Notification::addNotification('review', 'New video review', route('update_video_review_item', $video_review->id),);
            }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }
}
