<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\PositionsImport; 
use App\Exports\PositionsExport;
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $departments = DB::table('departments')->get();
        // $positions= DB::table('positions')->get();
        // return view('position', ['departments' => $departments,
        //                         'positions' => $positions]);


        //call department from Position Model
        $positions=Position::with('department')->get();
        
        //print_r($positions);
        return view('position', [
            'positions' => $positions,
            'departments' => $departments
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'position_name' => 'bail|required|unique:positions|min:5|max:30'
        ]);
        
        $position = new Position();
        $position->position_name = $request['position_name'];
        $position->department_id= $request['department_id'];
        //print_r($request['department_id']);

        $position->save();

        return redirect('/position');
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

    public function fileImport(Request $request) { 
        Excel::import(new PositionsImport, $request->file('file')->store('temp')); 
        return back(); 
    }

    //file data download with .csv
    public function fileExportCSV() { 
        return Excel::download(new PositionsExport, 'PositionList.csv'); 
    }
    //file data download with .xlsx
    public function fileExportXLSX() { 
        return Excel::download(new PositionsExport, 'PositionList.xlsx'); 
    }
}
