<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockDeliveryController extends Controller
{
    public function get_all_delivery(){
        return view('admin/all-delivery-page');
    }
}
