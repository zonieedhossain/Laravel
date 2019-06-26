@extends('layouts.app')

@section('title','Classes')

    @section('content')
    <div class="card-header">Class List</div>
       
        <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"> <a href=" {{ url('class/create')}} "> <button type="button" class="btn btn-dark">Add New Class</button></a></th>
                   
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
                  <th scope="col">Class</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Class Time</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($classes as $class)
                <tr>
                <th scope="row">{{ $class->id }}</th>
                  <td>{{ $class->class }}</td>
                  <td>{{ $class->subject }}</td>
                  <td>{{ $class->classtime }}</td>
                  <td>
                  <a href=" {{ url('class/edit',$class->id) }} "> <button type="button" class="btn btn-success">Edit</button></a>
                  <form id="delete-form-{{ $class->id }}" method="POST" action="{{ url('class/delete',$class->id) }}" style="display:none">
                        {{  csrf_field ()}}
                        {{  method_field('DELETE')}}
                  </form>     
                <a href="" onclick="
                        if(confirm('Are you sure, You what to delete this ??'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $class->id }}').submit();
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