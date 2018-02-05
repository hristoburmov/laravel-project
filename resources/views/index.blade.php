@extends('layouts.main')

@section('title', 'Home Page')

@section('content')

<div class="row">
    
    <div class="col-md-9">
        @foreach($posts as $post)
        <div class="posts">
        <article>
        <h4 class="h4 posts-title"><a href="/post/{{$post->id}}">{{$post->title}}</a></h4>
            <hr class="hr">
            <p class="posts-description">
                Category: <a style="text-decoration: none; color: grey" href="/category/{{$post->cId}}">{{ $post->category_name }}</a> | 
                <a style="text-decoration: none; color: grey;" href="/post/{{$post->id}}#commentSection">View Comments({{ $post->comments_count }})</a>
            </p>
            <p class="posts-content">
            {{$post->content}}
            </p>
            <p class="posts-description">
            Posted by {{ $post->name }}, on {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}. Last edited on {{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y')}}
            </p>
        </article>  
        </div>
        @endforeach
        {{ $posts->links() }}
    </div>
    
    
    <div class="col-md-3">
        
        <span class="section-title">Categories</span>
        
        <hr class="hr" />
        
        <ul id="categories-list">
        @foreach($categories as $category)   
            <li><a href="/category/{{$category->id}}">{{$category->category_name}}</a></li> 
        @endforeach
        </ul>
     
    </div>
    
</div>

@endsection