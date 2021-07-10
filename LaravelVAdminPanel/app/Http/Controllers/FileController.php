<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload_file(Request $request){
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $file = new Files;
        if($request->file()){
            $name = time() . '_' .  $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads/' .
                date('Y') . '/' . date('m'), $name, 'public');

            $file->name = $name;
            $file->file_path = Storage::url($file_path);
            $file->save();
            $id = $file->id;

            return response()
                ->json([
                    'status' => 'ok',
                    'file' => $name,
                    'id' => $id,
                    'path' => Storage::url($file_path),
                ]);
        }
        return response()
            ->json([
                'status' => 'error',
                'file' => 'error',
            ]);
    }

    public function get_selected_info(Request $request){
        $id = $request->input('id');
//        dd($request->id);
        $file = Files::find($id);

        $size = filesize(public_path($file->file_path));
        $response = [
            'status'    => 'ok',
            'name'      => $file->name,
            'alt'       => $file->alt_name,
//            'size'      => Storage::size($file->file_path),
            'size'      => number_format( $size / 1048576, 2 ),
            'path'      => $file->file_path
        ];
        return response()->json($response);
    }

    public function update_file_info(Request $request){
        $file = Files::find($request->input('id'));
        $file->name = $request->input('name');
        $file->alt_name = $request->input('alt_name');
        $result = $file->save();

        return response()
            ->json([
                'status' => $result
            ]);
    }

    public function delete_selected_file(Request $request){
        $file = Files::find($request->input('id'));
        unlink(public_path($file->file_path));
        $status_delete = $file->delete();
        return response()
            ->json([
                'status' => $status_delete
            ]);
    }

}
