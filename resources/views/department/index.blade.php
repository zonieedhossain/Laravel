@extends('layouts.app')

@section('title','Departments')

    @section('content')
        <a href=" {{ url('department/create')}} "> <button type="button" class="btn btn-success">Add New Department</button></a>
    @endsection