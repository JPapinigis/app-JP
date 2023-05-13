@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Conference</h1>

        <form action="{{ route('conferences.update', $conference->id) }}" method="POST">
            @csrf
           @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $conference->title }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="organizer">Organizer</label>
                <input type="text" name="organizer" id="organizer" value="{{ $conference->organizer }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="start_date">Start date</label>
                <input type="date" name="start_date" id="start_date" value="{{ $conference->start_date }}" class="form-control">
            </div>


            <div class="form-group">
                <label for="end_date">End date</label>
                <input type="date" name="end_date" id="end_date" value="{{ $conference->end_date }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"  class="form-control">{{ $conference->description }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Update</button>
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
