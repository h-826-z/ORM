<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profiles = DB::table('profiles')->get();
        
        // return view('profile', ['profiles' => $profiles,
        //                         'employees' => $employees]);
        //$profiles=Profile::find(1)->employee;
        $employees= DB::table('employees')->get();

        $profiles=Profile::with('employee')->get();
        // foreach($profiles as $p){
        //     print_r($p->employee['employee_id']);
        // }
        // die();
        return view('profile', [
            'profiles' => $profiles,
            'employees' => $employees
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
           
            'profile_age' => 'required',
            'profile_height' => 'required',
            'profile_father_name' => 'required|min:5|max:30',
            'employee_id' => 'required|unique:profiles'
            
        ]);
        
        $profile = new Profile();
        $profile->age =$request['profile_age'];
        $profile->height =$request['profile_height'];
        $profile->father_name = $request['profile_father_name'];
        $profile->employee_id= $request['employee_id'];
        //print_r($request['employee_id']);
        $profile->save();

        return redirect('/profile');
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
    public function createPDF()
    {
        $data=Profile::with('employee')->get();
        view()->share('profile',$data);
        $pdf=PDF::loadView('profile_pdf',$data);
        return $pdf->download('profile_pdf.pdf');
    }
}
