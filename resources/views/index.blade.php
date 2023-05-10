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
                @if(session('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('conferences.create') }}">Create</a>
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

            <tbody>

                @foreach($conferences as $conference)
                    <tr>
                        <td>{{$conference->title}}</td>
                        <td>{{$conference->organizer}}</td>
                        <td>{{$conference->start_date}}</td>
                        <td>{{$conference->end_date}}</td>
                        <td>{{$conference->description}}</td>
                        @if(session('login'))
                        <td><a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this conference?')">
                            @csrf
                            @method ('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection





