@extends('layouts.main')

@section('title', 'About Page')

@section('content')

<article>

<h3> {{ $post->title }}</h3>

<hr class="hr">

<p style="font-size: 20px;" class="posts-content">
    {{$post->content}}
</p>
<p class="posts-description">
    Posted by on {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}. Last edited on {{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y')}}
</p>

 </article>  

<hr class="hr">

<h4 id="commentSection" style="margin-top: 80px;"> Comments: </h4>

<hr class="hr">


@foreach($comments as $comment)

<div class="row" style="margin-top: 20px;" class="comments">
    <div class="col-md-3"><h5>Posted by <strong>{{$comment->uName}}</strong> on {{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y')}}</h5></div>
    <div style="font-size: 18px;" class="col-md-9"><p> {{$comment->content}}</p></div>
</div>

@endforeach

<div>
    <!-- Comment Form -->
</div>

@endsection