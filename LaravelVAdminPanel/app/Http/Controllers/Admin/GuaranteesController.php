<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RequestInput;
use App\Models\Files;
use App\Models\Guarantees;
use Illuminate\Http\Request;

class GuaranteesController extends Controller
{
    function get_all_guarantees(){
        return view('admin/guarantees-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => \App\Helpers\Guarantees::get_db_fields(),
        ]);
    }

    function edit_block_guarantees(Request $request){
        $array_fields = RequestInput::get_fields_val($request);

        Guarantees::query()->delete();

        foreach( $array_fields as $fields ){
            if( is_array($fields) )
                foreach ( $fields as $key=>$value) {
                    $guarantees = new Guarantees;
                    $guarantees->title = $value['inputField'];
                    $guarantees->file_id = $value['imageField'];
                    $guarantees->description = $value['textareaInput'];
                    $guarantees->save();
                }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }
}
