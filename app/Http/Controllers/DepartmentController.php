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
        return view('department.index');
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
}
