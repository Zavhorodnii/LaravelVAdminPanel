<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function admin_check(Request $request){
        $data = $request->only('email', 'password');
//        dd($data);

        if(!Auth::attempt($data)){
            return redirect(route('admin'));
        }
        return redirect(route('all-benefits'));
    }
}
