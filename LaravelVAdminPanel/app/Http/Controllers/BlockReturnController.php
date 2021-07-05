<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockReturnController extends Controller
{
    public function get_all_return(){
        return view('admin/all-return-page');
    }
}
