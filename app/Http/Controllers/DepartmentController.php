<?php

namespace App\Http\Controllers;
use App\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index ()
    {
        $departments = Department::all();
        return view('department.index',compact('departments'));
    }
    public function create ()
    {
        return view('department.create');
    }
    public function save(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        Department::create([
            'title' => $request->title
        ]);
        return redirect()->back()->with('status', 'Department Successfully Saved');
    }
    public function edit($id)
    {
        $department = Department::find($id);
     
        return view('department.edit',compact('department'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        $dpt = Department::find($id);
        $dpt->title = $request->title;
        $dpt->save();
        return redirect()->back()->with('status', 'Department Successfully Updated');
    }
    
    public function delete($id)
    {
        $dpt = Department::find($id);
        $dpt->delete();
        return redirect()->back()->with('status', 'Department Successfully Deleted');
    }
}
