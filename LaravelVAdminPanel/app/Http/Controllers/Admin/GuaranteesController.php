<?php

namespace App\Http\Controllers\Admin;

use App\Models\Files;
use App\Models\Guarantees;
use Illuminate\Http\Request;
require_once 'Support_files/Get_fields_val.php';

class GuaranteesController extends Controller
{
    function get_all_guarantees(){
        return view('admin/guarantees-page', [
            'files' => Files::orderBy('id', 'DESC')->get(),
            'fields' => $this->get_db_fields(),
        ]);
    }

    function edit_block_guarantees(Request $request){

//        var_export($request->input());
        $array_fields = get_fields_val($request);

        Guarantees::query()->delete();

//        var_export($array_fields);

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

    function get_db_fields(){
        $all_fields = Guarantees::all();
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
                'inputField' => $items->title,
                'imageField' => $file,
                'textareaInput' => $items->description,
            ];
            $index++;
        }
        return $fields;
    }
}
