@extends('layouts.main')

@section('title', 'Contact')

@section('content')

@include('shared.message')

<div class="row">
    <div class="col-md-8">
        <h2 class="mb-3 mt-3">@yield('title')</h2>
        <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="contact-email">Email:</label>
                <input type="text" id="contact-email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="contact-subject">Subject:</label>
                <input type="text" id="contact-subject" class="form-control" name="subject" value="{{ old('subject') }}">
            </div>
            <div class="form-group">
                <label for="contact-message">Message:</label>
                <textarea id="contact-message" class="form-control" rows="5" name="message">{{ old('message') }}</textarea>
            </div>
            <input type="submit" value="Send message" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection