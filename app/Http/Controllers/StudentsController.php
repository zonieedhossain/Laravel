<?php

namespace App\Http\Controllers;

use App\Students;
use App\Department;
use App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Auth;


use SplFileInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;




class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        
        return view('student.index', compact('students'));
    }
    public function create()
    {
        $departments = Department::all();
        $classes = Classes::all();
        return view('student.create',compact('departments','classes'));
    }
    public function save(Request $request)
    {
      
        $this->validate($request, [
            'name' =>'required',
            'phone_num' => 'required',
            'email' => 'required',
            'roll' =>'required',
            'reg_no' => 'required',
            'image' => 'required', // required|image|mimes:jpeg,png,jpg,gif,svg|max:2048;
            'department_name' => 'required',
            'class_name' => 'required',
            'father_name' => 'required',
            'mother_name' =>'required',
            'address' => 'required',
            'guardian_num' => 'required',
           
        ]);
    
        // $image = $request->file('image');
        // $new_name =rand(). '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('students'),$new_name);
        // $form_data=array(
        //     'name' => $request->name,
        //         'phone_num' => $request->phone_num,
        //         'email' => $request->email,
        //         'roll' => $request->roll,
        //         'reg_no' => $request->reg_no,
        //         'image' => $new_name,
        //         'department_name' => $request->department_name,
        //         'class_name' => $request->class_name,
        //         'father_name' => $request->father_name,
        //         'mother_name' => $request->mother_name,
        //         'address' => $request->address,
        //         'guardian_num' => $request->guardian_num,
                
        // );

        // Crud::create($form_data);

        // Students::create($request->all());
   
        $stdImage='';
      
        
        if ($request->hasFile('image')){  
             
            $image = $request->file('image'); 
                       
            $filename=time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/students'.$filename));
         
            $stdImage=$filename;
        }
      
        DB::table('students')->insert([
            'name' => $request->name,
            'phone_num' => $request->phone_num,
            'email' => $request->email,
            'roll' => $request->roll,
            'reg_no' => $request->reg_no,
            'department_name' => $request->department_name,
            'class_name' => $request->class_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'address' => $request->address,
            'guardian_num' => $request->guardian_num,
            'image' => $stdImage,
        ]);
        
        return redirect()->back()->with('status', ('New Student Details Create successfully'));
    }
    public function edit($id)
    {
        $student = Students::find($id);
        $departments = Department::all();
        $classes = Classes::all();
        return view('student.edit', compact('student','departments','classes'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'roll' => 'required'
        ]);
        $std = Students::find($id);
        $std->update($request->all());
        return redirect()->back()->with('status', ('Student Details Updated successfully'));
    }
    public function delete($id)
    {
        $std = Students::find($id);
        $std->delete();
        
        return redirect()->back()->with('status', ('Student Details Deleted successfully'));
    }
}
