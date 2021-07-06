<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockAdsController extends Controller
{
    public function get_all_ads(){
        return view('admin/all-ads-page');
    }
}
