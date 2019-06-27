@extends('layouts.app')

@section('title','Update Teacher Details')

    @section('content')
    <div class="container">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">Update Teacher Details # {{ $teacher->name }}</div>
                        @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                                {{ session('status')}}
                              </div>
                        @endif
                        <div class="card-body">
                        <form method="POST" action=" {{ url('teacher/update',$teacher->id)}} ">
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
                                                            <label for="subject" class="col-md-4 col-form-label text-md-right">Subject Name</label>
                                
                                                            <div class="col-md-6">
                                                                 <select class="form-control @error('class_name') is-invalid @enderror" name="class_name" required>
                                                                        <option value="">Select Teacher Subject</option>
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