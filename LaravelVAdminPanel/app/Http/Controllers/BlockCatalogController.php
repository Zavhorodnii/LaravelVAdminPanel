<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockCatalogController extends Controller
{
    public function get_all_catalog(){
        return view('admin/all-catalog-page');
    }
}
