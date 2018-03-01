@extends('layouts.main')

@section('title', 'Edit Category Page')

@section('content')

@include('shared.message')

@include('admin.admincp-nav')

<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 row">
            <div class="col-sm-8"><h2>@yield('title')</h2></div>
            <div class="col-sm-4"><a href="{{ route('admin.categories') }}"><button class="btn btn-danger float-right">Back to all categories</button></a></div>
        </div>
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
</div>

@endsection