@extends('layouts.app')
<body>
@include('layouts.header')

@section('content')
  <div class="container">
    <h1>Laravel 5.5 Full Text Search Example</h1>
    <form method="GET" action="{{ route('search') }}">
      <div class="row">
        <div class="col-md-6">
          <input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
        </div>
        <div class="col-md-6">
          <button class="btn btn-success">Search</button>
        </div>
      </div>
    </form>
    <table class="table table-bordered">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
      @if($users->count())
        @foreach($application as $app)
        <tr>
          <td>{{ $app->id }}</td>
          <td>{{ $app->name }}</td>
          <td>{{ $app->description }}</td>
        </tr>
        @endforeach
      @else
      <tr>
        <td colspan="3">Result not found.</td>
      </tr>
      @endif
    </table>
  </div>
  @include('layouts.footer')
  </body>
