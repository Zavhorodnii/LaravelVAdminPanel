<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockBestsellersController extends Controller
{
    public function get_all_bestsellers(){
        return view('admin/all-bestsellers-page');
    }
}
