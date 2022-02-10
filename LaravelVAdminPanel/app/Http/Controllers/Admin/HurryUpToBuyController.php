<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Http\Controllers\Admin\Controller;
use App\Models\Files;
use App\Models\HurryUpToBuy;
use Illuminate\Http\Request;

class HurryUpToBuyController extends Controller
{
    public function get_all(){
        return view('admin/hurry-up-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => \App\Helpers\HurryUpToBuy::get_db_fields(),
        ]);
    }

    public function create(Request $request){
        HurryUpToBuy::query()->delete();

        $array_fields = RequestInput::get_fields_val($request);
        $buy = new HurryUpToBuy;

        $buy->title = $array_fields['title'];
        $buy->gift_count = $array_fields['gift-count'];
        $buy->button_title = $array_fields['button-title'];

        $buy->save();


        return response()
            ->json([
                'status'    => 'ok',
            ]);

    }
}
