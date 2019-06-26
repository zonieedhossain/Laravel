<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exceptions\Handler;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('class.index', compact('classes'));
    }
    public function create()
    {
        return view('class.create');
    }
    public function save(Request $request)
    {
        $this->validate($request, [
            'class' => 'required',
            'subject' => 'required',
            'classtime' => 'required'
        ]);

        DB::table('classes')->insert([
            'class' => $request->class,
            'subject' => $request->subject,
            'classtime' => $request->classtime
        ]);
        
        return redirect()->back()->with('status', ('New Class Create successfully'));
    }
    public function edit($id)
    {
        $class = Classes::find($id);
        return view('class.edit', compact('class'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'class' => 'required'
        ]);
        $cls = Classes::find($id);
        $cls->update($request->all());
  
        return redirect()->back()->with('status', ('Department Updated successfully'));
    }
    public function delete($id)
    {
        $cls = Classes::find($id);
        $cls->delete();
        
        return redirect()->back()->with('status', ('Class Deleted successfully'));
    }
}
