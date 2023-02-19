<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //


    private $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];

    public function show(){

        $user = new User;
        return view('auth.login', [
            'user' => $user
        ]);
    }



    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect(route('auth.login'));
    }
}
