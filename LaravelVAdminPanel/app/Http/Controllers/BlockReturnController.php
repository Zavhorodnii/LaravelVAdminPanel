<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;

class BlockReturnController extends Controller
{
    public function get_all_return(){
        return view('admin/all-return-page');
    }

    public function create_return_block(){
        return view('admin/create-return-block', [
            'files' => Files::all(),
        ]);
    }

}
