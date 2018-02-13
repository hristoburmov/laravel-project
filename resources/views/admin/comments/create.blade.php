@extends('layouts.main')

@section('title', 'New Comment')

@section('content')

@include('shared.message')

<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 row">
            <div class="col-sm-8"><h2>@yield('title')</h2></div>
            <div class="col-sm-4"><a href="{{ route('admin.comments') }}"><button class="btn btn-danger float-right">Back to all comments</button></a></div>
        </div>
        <form action="{{ route('admin.comments.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="comment-post">Post:</label>
                    <select id="comment-post" class="form-control" name="post">
                        @foreach($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="comment-user">User:</label>
                    <select id="comment-user" class="form-control" name="user">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comment-content">Comment:</label>
                <textarea id="comment-content" class="form-control" rows="5" name="comment"></textarea>
            </div>
            <input type="submit" value="Add comment" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection