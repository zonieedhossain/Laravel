@extends('layouts.app')

@section('title','Departments')

    @section('content')
    <div class="card-header">Department List</div>
       
        <table class="table">
                <thead class="thead-light">
                  <tr>
                  
                    <th scope="col"> <a href=" {{ url('department/create')}} "> <button type="button" class="btn btn-dark">Add New Department</button></a></th>
                   
                    <th> 
                      <form class="form-inline ml-auto" action="{{ url('department/search') }}" method="GET"> 
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
                  <th scope="col">Title</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              
                  @foreach($departments as $department)
                <tr>
                <th scope="row">{{ $department->id }}</th>
                  <td>{{ $department->title }}</td>
                  <td>
                  <a href=" {{ url('department/edit',$department->id) }} "> <button type="button" class="btn btn-success">Edit</button></a>
                  <form id="delete-form-{{ $department->id }}" method="POST" action="{{ url('department/delete',$department->id) }}" style="display:none">
                        {{  csrf_field ()}}
                        {{  method_field('DELETE')}}
                  </form>     
                <a href="" onclick="
                        if(confirm('Are you sure, You what to delete this ??'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $department->id }}').submit();
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