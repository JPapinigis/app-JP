@extends('layouts.app')
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('conferences.index') }}">Conferences</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div class="container">
        <h1>Conference List</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Organizer</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Description</th>
            </tr>
            </thead>
            @endsection
            @section('scripts')
                <tbody>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{$conference->title}}</td>
                        <td>{{$conference->organizer}}</td>
                        <td>{{$conference->start_date}}</td>
                        <td>{{$conference->end_date}}</td>
                        <td>{{$conference->description}}</td>
                        <td><a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-primary">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
@endsection

