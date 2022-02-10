<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BenefitsFields;
use App\Helpers\RequestInput;
use App\Models\Benefits;
use App\Models\Files;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BenefitsController extends Controller
{
    function get_all_benefits(){
        return view('admin/benefits-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => BenefitsFields::get_db_fields(),
        ]);
    }

    function update(Request $request){
        $array_fields = RequestInput::get_fields_val($request);

        Benefits::query()->delete();

        foreach( $array_fields as $fields ){
            if( is_array($fields) )
                foreach ( $fields as $key=>$value) {
                    $guarantees = new Benefits;
                    $guarantees->title = $value['textareaInput'];
                    $guarantees->file_id = $value['imageField'];
                    $guarantees->save();
                }
        }

        return response()
            ->json([
                'status'    => 'ok',
            ]);
    }

}
