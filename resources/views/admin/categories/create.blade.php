@extends('layouts.main')

@section('title', 'Create Category Page')

@section('content')

@include('shared.message')

@include('admin.admincp-nav')

<div class="row">
    <div class="col-md-12">
        <div class="mb-3 mt-3 row">
            <div class="col-sm-8"><h2>@yield('title')</h2></div>
            <div class="col-sm-4"><a href="{{ route('admin.categories') }}"><button class="btn btn-danger float-right">Back to all categories</button></a></div>
        </div>
        <form method="post" action="{{route('admin.categories.store')}}">
             {{ csrf_field() }}

            <label class="control-label" for="category_name"><strong>Category name:</strong></label>
            <input required="required" type="text" class="form-control" name="category_name">
            <br>
            <input type="submit" value="Create" class="btn btn-primary">

        </form>
    </div>
</div>

@endsection