<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     private $rules = [
        'name' => 'required|max:150|regex:/^[a-zA-Z ]*$/',
        'email' => 'required|max:150|email',
        'password'=>'required|max:125',
    ];


    private $messages = [
        'name.regex' => 'The name field can only contain alphabet and spaces'
    ];





    public function index(Request $request)
    {

        $action = route('users.store');
        $user = new User;
        return view('users.index', [
            'user' => $user,
            'action' => $action
        ])->with('findUsers', User::withTrashed()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $title = 'Add User';
        $action = route('users.store');
        $user = new User;
        return view('users.index', [
            'user' => $user,
            'title' => $title,
            'action' => $action
        ])->with('findUsers', User::all());
    }  



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = $this->rules;
        $rules['email'] = Rule::unique('users');
       // $rules['phone'] [] = Rule::unique('students');
       $validator = Validator::make($data, $rules, $this->messages);

       if ($validator->fails()) {
        return redirect(route('users.create'))
        ->withErrors($validator)
        ->withInput();
    }

    $user = User::create($data);

        $userListRoute = route('users.index');
        return redirect($userListRoute)
        ->with('status', "$user->name added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findById($id);
        $title = 'Edit User';
        $action = route('users.update', ['id' => $id]);

        return view('users.form', [
            'edit' => true,
            'title' => $title,
            'action' => $action,
            'user' => $user
        ])->with('findUsers', User::all());
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findById($id);
        $data = $request->all();


        $rules = $this->rules;
        //$rules['visitor_id'][] = Rule::unique('visitors')->ignore($visitor);
        $rules['email'][] = Rule::unique('users')->ignore($user);
        $validator = Validator::make($data, $rules, $this->messages);

        if ($validator->fails()) {
            return redirect(route('users.edit', ['id' => $id]))
            ->withErrors($validator)
            ->withInput();
        }


        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->password = $data['password'];
    
        $user->save();

        $userRoute = route('users.index');
        return redirect($userRoute)->with('status', " $user->name Profile Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findById($id);
        $user->delete();

        $userRoute = route('users.index');
        return redirect($userRoute)->with('status', "User deleted Successfully");
    }




    
        /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        $user->restore();
        $userRoute = route('users.index');
        return redirect($userRoute)->with('status', "User restore Successfully");
    }
}
