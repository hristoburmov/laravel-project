@extends('layouts.main')

@section('title', 'All posts')

@section('content')

@include('shared.message')

<div>
    <div class="mb-3 mt-3 row">
        <div class="col-sm-8"><h2>Posts</h2></div>
        <div class="col-sm-4"><a href="{{ route('admin.posts.create') }}"><button class="btn btn-primary float-right">New post</button></a></div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>User</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->category->category_name }}</td>
                <td>{{ $post->user->name }}</td>
                <td><a href="{{ route('admin.posts.edit', $post->id)}}"><button class="btn btn-success">Edit</button></a></td>
                <td>
                    <form method="post" action="{{ route('admin.posts.destroy', $post->id) }}">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection