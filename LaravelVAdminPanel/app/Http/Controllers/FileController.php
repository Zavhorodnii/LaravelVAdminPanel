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
}
