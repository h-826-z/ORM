<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = DB::table('employees')->get();
        // $positions= DB::table('positions')->get();
        // return view('employee', ['employees' => $employees,
        //                         'positions' => $positions]);
        
        $employees=Employee::with('position')->get();

        return view('employee', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
           
             
            
        ]);
        
        $employee = new Employee();
        $employee->name =$request['employee_name'];
        $employee->position_id =$request['position_id'];
        $employee->email = $request['employee_email'];
        $employee->salary= $request['employee_salary'];
        $employee->description= $request['employee_description'];
        //print_r($request['position_id']);
        $employee->save();

        return redirect('/employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $employee=Employee::where('id',$id)->get();
        //print_r($employee);
        return view('profile_detail', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
