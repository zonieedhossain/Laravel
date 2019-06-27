<?php

namespace App\Http\Controllers;

use App\Teacher;
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


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        
        return view('teacher.index', compact('teachers'));
    }
    public function create()
    {
       
        $classes = Classes::all();
        return view('teacher.create',compact('classes'));
    }
    public function search(Request $request)
    {
       
         $search =$request ->get ('search');
       
         $teachers  = DB::table('teachers')->where('subject', 'like', '%' .$search. '%')->paginate(5);
      
        return view('teacher.index', ['teachers'=>$teachers]);
    }
    public function save(Request $request)
    {
      
        $this->validate($request, [
            'name' =>'required',
            'phone_num' => 'required',
            'email' => 'required',
            'image' => 'required', // required|image|mimes:jpeg,png,jpg,gif,svg|max:2048
            'subject' => 'required',
            'address' => 'required',

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
            Image::make($image)->save(public_path('/uploads/teachers'.$filename));
         
            $stdImage=$filename;
        }
      
        DB::table('teachers')->insert([
            'name' => $request->name,
            'phone_num' => $request->phone_num,
            'email' => $request->email,
            'subject' => $request->subject,
            'address' => $request->address,
            'image' => $stdImage,
        ]);
        
        return redirect()->back()->with('status', ('New Teacher Details Create successfully'));
    }
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $classes = Classes::all();
        return view('teacher.edit', compact('teacher','classes'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'subject' => 'required'
        ]);
        $std = Teacher::find($id);
        $std->update($request->all());
        return redirect()->back()->with('status', ('Teacher Details Updated successfully'));
    }
    public function delete($id)
    {
        $std = Teacher::find($id);
        $std->delete();
        
        return redirect()->back()->with('status', ('Teacher Details Deleted successfully'));
    }
}
