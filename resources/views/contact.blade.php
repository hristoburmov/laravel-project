@extends('layouts.main')

@section('title', 'Contact')

@section('content')

@if($errors->any())
    <div class="alert alert-danger mt-3">
        <h4>Some problems occurred:</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success mt-3">
        <h4>Success</h4>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

<div class="row">
    <div class="col-md-8">
        <h2 class="mb-3 mt-3">@yield('title')</h2>
        <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="contact-email">Email:</label>
                <input type="text" id="contact-email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="contact-subject">Subject:</label>
                <input type="text" id="contact-subject" class="form-control" name="subject">
            </div>
            <div class="form-group">
                <label for="contact-message">Message:</label>
                <textarea id="contact-message" class="form-control" rows="5" name="message"></textarea>
            </div>
            <input type="submit" value="Send" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection