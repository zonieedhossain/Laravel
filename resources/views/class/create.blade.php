@extends('layouts.app')

@section('title','Add New Class')

    @section('content')
    <div class="container">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">Add New Class</div>
                        @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                                {{ session('status')}}
                              </div>
                        @endif
                        <div class="card-body">
                        <form method="POST" action=" {{ url('class/save')}} ">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="class" class="col-md-4 col-form-label text-md-right">Class</label>
        
                                    <div class="col-md-6">
                                        <input id="class" type="class" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" required autocomplete="class" autofocus>
        
                                        @error('class')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>
            
                                        <div class="col-md-6">
                                            <input id="subject" type="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
            
                                            @error('subject')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="classtime" class="col-md-4 col-form-label text-md-right">Class Time</label>
                
                                            <div class="col-md-6">
                                                <input id="classtime" type="classtime" class="form-control @error('classtime') is-invalid @enderror" name="classtime" value="{{ old('classtime') }}" required autocomplete="classtime" autofocus>
                
                                                @error('classtime')
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