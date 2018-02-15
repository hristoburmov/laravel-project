@extends('layouts.main')

@section('title', 'Admin Page')

@section('content')

<h3 style="text-align: center"> Admin CP </h3>

<p><a href="{{ route('admin.categories') }}">Categories</a></p>
<p><a href="{{ route('admin.posts') }}">Posts</a></p>
<p><a href="{{ route('admin.comments') }}">Comments</a></p>

@endsection