@extends('layouts.app')

@section('title','Teachers')

    @section('content')
    <div class="card-header">Teacher List</div>
       
        <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"> <a href=" {{ url('teacher/create')}} "> <button type="button" class="btn btn-dark">Add New Teacher</button></a></th>
                    <th> 
                        <form class="form-inline ml-auto" action="{{ url('teacher/search') }}" method="GET"> 
                          <div class="md-form my-0">
                            <input  id="title" type="search" class="form-control" name="search" value="{{ old('search') }}" required autocomplete="search" placeholder="Search" autofocus>
                          </div>
                          <button class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Search</button>
                        </form>
                      </th>
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
                  <th scope="col">Teacher Name</th>
                  <th scope="col">Teacher Image</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Email</th>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($teachers as $teacher)
                <tr>
                <th scope="row">{{ $teacher->id }}</th>
                  <td>{{ $teacher->name }}</td>
                <td><img src="/uploads/teachers{{ $teacher->image }}" style="height: 50px; width=50px ;"></td>
                  <td>{{ $teacher->phone_num }}</td>
                  <td>{{ $teacher->email }}</td>
                  <td>{{ $teacher->subject}}</td>
                  <td>{{ $teacher->address }}</td>
                  <td>
                  <a href=" {{ url('teacher/edit',$teacher->id) }} "> <button type="button" class="btn btn-success">Edit</button></a>
                  <form id="delete-form-{{ $teacher->id }}" method="POST" action="{{ url('teacher/delete',$teacher->id) }}" style="display:none">
                        {{  csrf_field ()}}
                        {{  method_field('DELETE')}}
                  </form>     
                <a href="" onclick="
                        if(confirm('Are you sure, You what to delete this ??'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $teacher->id }}').submit();
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