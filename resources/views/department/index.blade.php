@extends('layouts.app')

@section('title', 'Departments')

    @section('content')
    <div class="card">
        <div class="card-body">
           <h6> Department List</h6>
        
        </div>    
    <a href="{{url ('department/create')}}"><button type="button" class="btn btn-primary">Add New Department</button></a>
            <table class="table">                   
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($departments as $department)
                <tr>
                <td>{{$department->id}}</td>
                  <td>{{$department->title}}</td>
                <th><a href="{{url('department/edit', $department->id)}}">Edit</a> | 
                <form id="delete-form-{{ $department->id }}" method="POST" action="{{ url ('department/delete', $department->id) }}" style="display: none">
                    {{csrf_field()}}
                    {{ method_field('DELETE')}}
                </form>
                    <a href="" onclick="
                        if (confirm('Are you sure, you want to Delete this ??'))
                        {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $department->id }}').submit();
                        }
                        else {
                            event.preventDefault();
                        }
                    ">Delete</a></th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    @endsection