@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h1>Create Conference</h1>

    <form action="{{ route('conferences.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="organizer">Organizer</label>
            <input type="text" name="organizer" id="organizer" class="form-control">
        </div>

        <div class="form-group">
            <label for="start_date">Start date</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="end_date">End date</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
       @endif

@endsection
