@extends('layouts.app')

@section('title','Students')

    @section('content')
    <div class="card-header">Student List</div>
       
        <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"> <a href=" {{ url('student/create')}} "> <button type="button" class="btn btn-dark">Add New Student</button></a></th>
                   
                  </tr>
                </thead>
                
            </table>
            @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                                {{ session('status')}}
                              </div>
                        @endif
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Student Image</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Email</th>
                  <th scope="col">Roll No</th>
                  <th scope="col">Registration No</th>
                  <th scope="col">Department Name</th>
                  <th scope="col">Class Name</th>
                  <th scope="col">Father Name</th>
                  <th scope="col">Mother Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Guardian Number</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($students as $student)
                <tr>
                <th scope="row">{{ $student->id }}</th>
                  <td>{{ $student->name }}</td>
                <td><img src="/uploads/students{{ $student->image }}" style="height: 50px; width=50px ;"></td>
                  <td>{{ $student->phone_num }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->roll}}</td>
                  <td>{{ $student->reg_no }}</td>
                  <td>{{ $student->department_name }}</td>
                  <td>{{ $student->class_name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->mother_name }}</td>
                  <td>{{ $student->address }}</td>
                  <td>{{ $student->guardian_num }}</td>
                  <td>
                  <a href=" {{ url('student/edit',$student->id) }} "> <button type="button" class="btn btn-success">Edit</button></a>
                  <form id="delete-form-{{ $student->id }}" method="POST" action="{{ url('student/delete',$student->id) }}" style="display:none">
                        {{  csrf_field ()}}
                        {{  method_field('DELETE')}}
                  </form>     
                <a href="" onclick="
                        if(confirm('Are you sure, You what to delete this ??'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $student->id }}').submit();
                        }
                        else
                        {
                            event.preventDefault();
                        }"> 
                  <button type="button" class="btn btn-danger">Delete</button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
           
    @endsection