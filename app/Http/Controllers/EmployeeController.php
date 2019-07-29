<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }





    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at','asc')->paginate(20);
        return view('employeeHome')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'first' => 'required', 
           'last' => 'required', 
           'email' => 'required', 
           'phone' => 'required' 
           
        ]);

        $employee = new Employee;
        $employee->First_Name = $request->input('first');
        $employee->Last_Name = $request->input('last');
        $employee->email = $request->input('email');
        $employee->Phone_Number = $request->input('phone');
        $employee->save();

        // $employee->updateOrInsert([
        //     'First_Name'=>$request->input('first'),
        //     'Last_Name'=>$request->input('last'),
        //     'email'=>$request->input('email'),
        //     'Phone_Number'=> $request->input('phone')
        // ]);

        return redirect('/Dashboard/employeeHome')->with('success','Employee Saved');

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
        $employee = Employee::find($id);
        return view('editEmployee')->with('employee',$employee);
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
        $employee = new Employee;
         $employee->updateOrInsert(['id'=> $id],[
            'First_Name'=>$request->input('first'),
            'Last_Name'=>$request->input('last'),
            'email'=>$request->input('email'),
            'Phone_Number'=> $request->input('phone')
        ]);
        // $employee->First_Name = $request->input('first');
        // $employee->Last_Name = $request->input('last');
        // $employee->email = $request->input('email');
        // $employee->Phone_Number = $request->input('phone');
        // $employee->save();
        return redirect('/Dashboard/employeeHome')->with('success','Employee Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee =  Employee::find($id);
        $employee->delete();
        return redirect('/Dashboard/employeeHome')->with('success','Employee Deleted');

       
    }
}
