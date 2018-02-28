@extends('layouts.main')

@section('title', 'Create Post Page')

@section('content')

@include('shared.message')
    
<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 row">
            <div class="col-sm-8"><h2>@yield('title')</h2></div>
            <div class="col-sm-4"><a href="{{ route('admin.posts') }}"><button class="btn btn-danger float-right">Back to all posts</button></a></div>
        </div>
        <form action="{{ route('admin.posts.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="post-category">Category:</label>
                <select id="post-category" class="form-control" name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <label for="post-title">Title:</label>
                <input class="form-control" type="text" name="title">
                <label for="post-content">Content:</label>
                <textarea id="post-content" class="form-control" rows="5" name="content"></textarea>
            </div>
            <input type="submit" value="Add Post" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection