@extends('layouts.main')

@section('title', 'Edit Post Page')

@section('content')

@include('shared.message')
    
<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 row">
            <div class="col-sm-8"><h2>@yield('title')</h2></div>
            <div class="col-sm-4"><a href="{{ route('admin.posts') }}"><button class="btn btn-danger float-right">Back to all posts</button></a></div>
        </div>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="post-category">Category:</label>
                <select id="post-category" class="form-control" name="category">
                    @foreach($categories as $category)
                        <option @if($post->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>        
                <label for="post-title">Title:</label>
                <input class="form-control" type="text" name="title" value="{{ $post->title }}">
                <label for="post-content">Content:</label>
                <textarea id="post-content" class="form-control" rows="5" name="content">{{ $post->content }}</textarea>
            </div>
            <input type="submit" value="Edit Post" class="btn btn-primary">
             {{ method_field('put') }}
        </form>
    </div>
</div>

@endsection