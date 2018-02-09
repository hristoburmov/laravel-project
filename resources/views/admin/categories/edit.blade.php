@extends('layouts.main')

@section('title', 'Create Category Page')

@section('content')

<div>
     @if (count($errors) > 0)
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
    @endif
    
    <form method="post" action="{{route('admin.categories.update')}}">
         {{ csrf_field() }}
         
        <label class="control-label" for="category_name"><strong>Category name:</strong></label>
        <input required="required" type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
        <input type="hidden" name="id" value="{{$category->id}}">
        <br>
        <input type="submit" value="Update" class="btn btn-primary">
        
        {{method_field('put')}}
    </form>
</div>

@endsection