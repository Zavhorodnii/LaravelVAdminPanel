<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function all_pages(){
        return view('admin/all_pages');
    }
}
