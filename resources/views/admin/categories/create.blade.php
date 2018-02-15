@extends('layouts.main')

@section('title', 'Create Category Page')

@section('content')

@include('shared.message')

<div>
    <form method="post" action="{{route('admin.categories.store')}}">
         {{ csrf_field() }}
         
        <label class="control-label" for="category_name"><strong>Category name:</strong></label>
        <input required="required" type="text" class="form-control" name="category_name">
        <br>
        <input type="submit" value="Create" class="btn btn-primary">
        
    </form>
</div>

@endsection