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





    // public function login(Request $request){

    //     $data = $request->all();
    //     $user = User::all($data);
    //     $id = $user->getId();

    //     $connection = mysqli_connect("localhost","root","","logging");
    
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);

    //     if(Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         $sql = "UPDATE users set lastactivity = now() where id= '{$id}' ";
    //         $query_run = mysqli_query($connection, $sql);
    //         return redirect()->intended(route('visitors.index'));
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email and Password Incorrect',
    //     ])->onlyInput('email');
    // }


    // public function login(Request $request){
        
    //     $data = $request->all();
    //     $rules = $this->rules;
    //     $validator = Validator::make($data, $rules);

    //     if ($validator->fails()) {
    //         return redirect(route('authshow'))
    //         ->withErrors($validator)
    //         ->withInput();
    //     }

    //     if(Auth::attempt($validator)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended(route('studentsindex'));
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email and Password Incorrect',
    //     ])->onlyInput('email');
    // }




    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect(route('auth.login'));
    }
}
