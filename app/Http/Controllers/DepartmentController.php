<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$departments = DB::table('departments')->paginate(5);
        // $departments = DB::table('departments')
        //             ->select(DB::raw('MIN(id) as id, department_name, MIN(created_at) as created_at, MIN(updated_at) as updated_at'))
        //             ->groupBy('department_name')
        //             ->orderBy('id')->get();

        //with dep_id
        //$departments=Department::find(1)->positions()->get();

        //with  dep _name 
        $departments=Department::where('department_name','ROT')->get();
        //print_r($departments); 
        //die();

        return view('department', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'department_name' => 'bail|required|unique:departments|max:10'
        ]);
        
        $department = new Department();
        $department->department_name = $request['department_name'];
        $department->save();

        return redirect('/department');
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
