<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockGalleryController extends Controller
{
    public function get_all_gallery(){
        return view('admin/all-gallery-page');
    }
}
