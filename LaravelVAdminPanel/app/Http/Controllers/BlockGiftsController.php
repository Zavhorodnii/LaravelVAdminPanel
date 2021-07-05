<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockGiftsController extends Controller
{
    public function get_all_gifts(){
        return view('admin/all_gifts_page');
    }
}
