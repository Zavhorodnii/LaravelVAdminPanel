<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockHowWeWorkController extends Controller
{
    public function get_all_how_we_work(){
        return view('admin/all-how-we-work-page');
    }
}
