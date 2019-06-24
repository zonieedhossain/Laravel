@extends('layouts.app')

@section('content')
<table class="table table-bordered">
    <thead class="thead-dark ">
      <tr>
        <th scope="col"> Dashboard</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">                  
             @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!</th>
      </tr>
     
    </tbody>
  </table>
@endsection
