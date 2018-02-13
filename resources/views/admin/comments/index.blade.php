@extends('layouts.main')

@section('title', 'All comments')

@section('content')

@include('shared.message')

<div>
    <div class="mb-3 mt-3 row">
        <div class="col-sm-8"><h2>Comments</h2></div>
        <div class="col-sm-4"><a href="{{ route('admin.comments.create') }}"><button class="btn btn-primary float-right">New comment</button></a></div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Post</th>
                <th>Comment</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->post->title }}</td>
                <td>{{ $comment->content }}</td>
                <td><a href="{{ route('admin.comments') }}/edit/{{ $comment->id }}"><button class="btn btn-success">Edit</button></a></td>
                <td>
                    <form method="post" action="{{ route('admin.comments') }}/destroy/{{ $comment->id }}">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection