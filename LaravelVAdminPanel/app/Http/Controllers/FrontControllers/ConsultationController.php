<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Admin\Controller;
use App\Mail\ConsultationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConsultationController extends Controller
{
    public function sendMail(Request $request){
        Mail::to(User::select('email')->where('name', '=', 'admin')->first())
            ->send(new ConsultationMail(
                $request->input('name'),
                $request->input('phone'),
                $request->input('email')
            ));

        return response()
            ->json([
                'status'    => 'ok'
            ]);
    }
}
