<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benefits;
use App\Models\Files;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
require_once 'Support_files/Get_fields_val.php';

class BenefitsController extends Controller
{
    function get_all_benefits(){
        return view('admin/benefits-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
        ]);
    }

    function update(Request $request){
        $array_fields = get_fields_val($request);

        Benefits::query()->delete();

//        var_export($array_fields);

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

    function get_db_fields(){
        $all_fields = Benefits::all();
//        var_export($all_fields);
        $fields = array();
        $index = 1;
        foreach ($all_fields as $items){
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
            $fields[$index] = [
                'textareaInput' => $items->title,
                'imageField' => $file,
            ];
            $index++;
        }
        return $fields;
    }
}
