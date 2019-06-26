@extends('layouts.app')

@section('title','Update Student Details')

    @section('content')
    <div class="container">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">Update Student Details # {{ $student->name }}</div>
                        @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                                {{ session('status')}}
                              </div>
                        @endif
                        <div class="card-body">
                        <form method="POST" action=" {{ url('student/update',$student->id)}} ">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->name }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="phone_num" class="col-md-4 col-form-label text-md-right">Phone Number</label>
            
                                        <div class="col-md-6">
                                            <input id="phone_num" type="phone_num" class="form-control @error('phone_num') is-invalid @enderror" name="phone_num" value="{{ $student->phone_num }}" required autocomplete="phone_num" autofocus>
            
                                            @error('phone_num')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email }}" required autocomplete="email" autofocus>
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="roll" class="col-md-4 col-form-label text-md-right">Roll No</label>                 
                    
                                                <div class="col-md-6">
                                                    <input id="roll" type="roll" class="form-control @error('roll') is-invalid @enderror" name="roll" value="{{ $student->roll }}" required autocomplete="roll" autofocus>
                    
                                                    @error('roll')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                    <label for="reg_no" class="col-md-4 col-form-label text-md-right">Registration No</label>
                        
                                                    <div class="col-md-6">
                                                        <input id="reg_no" type="reg_no" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no" value="{{ $student->reg_no }}" readonly required autocomplete="reg_no" autofocus>
                        
                                                        @error('reg_no')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label for="department_name" class="col-md-4 col-form-label text-md-right">Department Name</label>
                            
                                                        <div class="col-md-6">
                                                                <select class="form-control @error('department_name') is-invalid @enderror" name="department_name" required>
                                                                    <option value="">Select One</option>
                                                                    @foreach($departments as $department)
                                                                        <option value="{{ $department->id }}" {{ $student->department_name == $department->id ? 'selected' : '' }}> {{ $department->title }}</option>
                                                                    @endforeach
                                                                    </select>
                                                            @error('department_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="class_name" class="col-md-4 col-form-label text-md-right">Class Name</label>
                                
                                                            <div class="col-md-6">
                                                                 <select class="form-control @error('class_name') is-invalid @enderror" name="class_name" required>
                                                                        <option value="">Select One</option>
                                                                        @foreach($classes as $class)
                                                                            <option value="{{ $class->id }}" {{ $student->class_name == $class->id ? 'selected' : '' }}> {{ $class->class }}</option>
                                                                        @endforeach
                                                                        </select>
                                                                @error('class_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="father_name" class="col-md-4 col-form-label text-md-right">Father Name</label>
                                    
                                                                <div class="col-md-6">
                                                                    <input id="father_name" type="father_name" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $student->father_name }}" required autocomplete="father_name" autofocus>
                                    
                                                                    @error('father_name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                    <label for="mother_name" class="col-md-4 col-form-label text-md-right">Mother Name</label>
                                        
                                                                    <div class="col-md-6">
                                                                        <input id="mother_name" type="mother_name" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ $student->mother_name }}" required autocomplete="mother_name" autofocus>
                                        
                                                                        @error('mother_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                            
                                                                        <div class="col-md-6">
                                                                            <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $student->address }}" required autocomplete="address" autofocus>
                                            
                                                                            @error('address')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                            <label for="guardian_num" class="col-md-4 col-form-label text-md-right">Guardian Phone Number </label>
                                                
                                                                            <div class="col-md-6">
                                                                                <input id="guardian_num" type="guardian_num" class="form-control @error('guardian_num') is-invalid @enderror" name="guardian_num" value="{{ $student->guardian_num }}" required autocomplete="guardian_num" autofocus>
                                                
                                                                                @error('guardian_num')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                             <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-dark">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @endsection