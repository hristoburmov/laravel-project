@extends('layouts.main')

@section('title', 'All categories')

@section('content')

<div>
    <a href="{{ route('admin.categories.create') }}"><button class="btn btn-primary">Create</button></a>
    
    <h3>Categories:</h3>
    
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category) 
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->category_name }}</td>
            <td><a href="{{ route('admin.categories.edit',$category->id) }}"><button class="btn btn-success">Edit</button></a></td>
            <td>
                <form method="post" action="{{ route('admin.categories.destroy', $category->id) }}">
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