<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exceptions\Handler;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }
    public function search(Request $request)
    {
       
         $search =$request ->get ('search');
       
         $departments  = DB::table('departments')->where('title', 'like', '%' .$search. '%')->paginate(5);
      
        return view('department.index', ['departments'=>$departments]);
    }
    public function create()
    {
        return view('department.create');
    }
    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        DB::table('departments')->insert([
            'title' => $request->title
        ]);
        
        return redirect()->back()->with('status', ('New Department Create successfully'));
    }
    
    public function edit($id)
    {   
        $department = Department::find($id);
        return view('department.edit', compact('department'));
    }
    public function update(Request $request,$id)
    {
        
        $this->validate($request, [
            'title' => 'required'
        ]);
        $dept = Department::find($id);
        $dept->title = $request->title;
        $dept->save();
        return redirect()->back()->with('status', ('Department Updated successfully'));
    }
    public function delete($id)
    {
        $dept = Department::find($id);
        $dept->delete();
        
        return redirect()->back()->with('status', ('Department Deleted successfully'));
    }
}
