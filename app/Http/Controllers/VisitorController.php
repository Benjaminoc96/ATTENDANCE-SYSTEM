<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     private $rules = [
        'name' => 'required|max:150|regex:/^[a-zA-Z ]*$/',
        'address' => 'required|max:150',
        'department'=>'required|max:125',
        'staff'=>'required|max:150|regex:/^[a-zA-Z ]*$/',
        'purpose'=>'required|max:125',
        'contact' => ['required','digits:10']
    ];



    private $messages = [
        'name.regex' => 'The name field can only contain alphabet and spaces'
    ];



    public function index()
    {
        $title = 'Add Visitor';
        $action = route('visitors.store');
        $visitor = new Visitor;
        return view('visitors.index', [
            'visitor' => $visitor,
            'title' => $title,
            'action' => $action
        ])->with('findVisitors', Visitor::all());
    }




    // VIEW ALL TRASHED VISITORS

    public function viewTrashedVisitors()
    {
        $visitor = Visitor::onlyTrashed();
        return view('visitors.trashed', [
            'visitor' => $visitor,
        ])->with('findVisitors', Visitor::onlyTrashed());
    }





    public function restoreVisitors($id)
    {
        $visitor = Visitor::withTrashed()->where('id', $id)->first();
        $visitor->restore();
        $listTrashedVisitors = route('visitors.viewTrashedVisitors');
        return redirect($listTrashedVisitors)->with('status', Visitor::all());
    }




    public function visitorslog()
    {
        return view('visitors.visitorslog');
    }


    public function printVisitorLog()
    {
        return view('visitors.printVisitorLog');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Visitor';
        $action = route('visitors.store');
        $visitor = new Visitor;
        return view('visitors.index', [
            'visitor' => $visitor,
            'title' => $title,
            'action' => $action
        ]);
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
        $rules['contact'] [] = Rule::unique('visitors');
       // $rules['phone'] [] = Rule::unique('students');
       $validator = Validator::make($data, $rules, $this->messages);

       if ($validator->fails()) {
        return redirect(route('visitors.create'))
        ->withErrors($validator)
        ->withInput();
    }

    $visitor = Visitor::create($data);

        $visitorListRoute = route('visitors.index');
        return redirect($visitorListRoute)->with('status', "$visitor->name Successfully Logged In");
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
        $visitor = Visitor::findById($id);
        $title = 'Edit Visitor';
        $action = route('visitors.update', ['id' => $id]);

        return view('visitors.form', [
            'edit' => true,
            'title' => $title,
            'action' => $action,
            'visitor' => $visitor
        ]);
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
        $visitor = Visitor::findById($id);
        $data = $request->all();


        $rules = $this->rules;
        //$rules['visitor_id'][] = Rule::unique('visitors')->ignore($visitor);
        $rules['contact'][] = Rule::unique('visitors')->ignore($visitor);
        $validator = Validator::make($data, $rules, $this->messages);

        if ($validator->fails()) {
            return redirect(route('visitors.edit', ['id' => $id]))
            ->withErrors($validator)
            ->withInput();
        }


        $visitor->name = $data['name'];
        $visitor->contact = $data['contact'];
        $visitor->address = $data['address'];
        $visitor->department = $data['department'];
        $visitor->staff = $data['staff'];
        $visitor->purpose = $data['purpose'];
        $visitor->visitor_type = $data['visitor_type'];
        $visitor->log_type = $data['log_type'];
    
        $visitor->save();

        $visitorRoute = route('visitors.index');
        return redirect($visitorRoute)->with('status', " $visitor->name Profile Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::findById($id);
        $visitor->delete();

        $visitorRoute = route('visitors.index');
        return redirect($visitorRoute)->with('status', "Visitor deleted Successfully");
    }







    function updateOnlyLogIn($id){

        DB::select("UPDATE visitors SET log_type = 'IN' where id = '{$id}'");
        $studentRoute = route('visitors.index');
        return redirect($studentRoute)->with('status', "Successfully Logged Out");

    }



    function updateOnlyLogOut($id){

		DB::update("UPDATE visitors SET log_type = 'OUT' where id = '{$id}'");

        $studentRoute = route('visitors.index');
        return redirect($studentRoute)->with('status', "Successfully Logged In");;

    }

}
