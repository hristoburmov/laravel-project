@extends('layouts.main')

@section('title', 'Edit comment')

@section('content')

@include('shared.message')

<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 row">
            <div class="col-sm-8"><h2>@yield('title')</h2></div>
            <div class="col-sm-4"><a href="{{ route('posts.show', $comment->post_id) }}"><button class="btn btn-danger float-right">Back to post</button></a></div>
        </div>
        <form action="{{ url('comment', $comment->id) }}" method="POST" class="mb-3">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
            <div class="form-group">
                <textarea id="comment-content" class="form-control" rows="5" name="comment" placeholder="Comment...">{{ $comment->content }}</textarea>
            </div>
            <input type="submit" value="Update comment" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection