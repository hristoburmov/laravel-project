@extends('layouts.main')

@section('title', 'Edit Category Page')

@section('content')

@include('shared.message')

<div>   
    <form method="post" action="{{route('admin.categories.update',$category->id)}}">
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