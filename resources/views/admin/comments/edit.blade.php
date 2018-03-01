@extends('layouts.main')

@section('title', 'Edit Comment')

@section('content')

@include('shared.message')

@include('admin.admincp-nav')

<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 row">
            <div class="col-sm-8"><h2>@yield('title')</h2></div>
            <div class="col-sm-4"><a href="{{ route('admin.comments') }}"><button class="btn btn-danger float-right">Back to all comments</button></a></div>
        </div>
        <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="comment-post">Post:</label>
                    <select id="comment-post" class="form-control" name="post">
                        @foreach($posts as $post)
                            <option @if($comment->post_id == $post->id) selected @endif value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="comment-user">User:</label>
                    <select id="comment-user" class="form-control" name="user">
                        @foreach($users as $user)
                            <option @if($comment->user_id == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comment-content">Comment:</label>
                <textarea id="comment-content" class="form-control" rows="5" name="comment">{{ $comment->content }}</textarea>
            </div>
            <input type="submit" value="Update comment" class="btn btn-primary">
            {{ method_field('put') }}
        </form>
    </div>
</div>

@endsection