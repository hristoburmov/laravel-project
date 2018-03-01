@if(Auth::check())
<h4 id="commentForm">Write a comment:</h4>
<form action="{{ url('post', $post->id) }}" method="POST" class="mb-3">
    {{ csrf_field() }}
    <div class="form-group">
        <textarea id="comment-content" class="form-control" rows="5" name="comment" placeholder="Comment..."></textarea>
    </div>
    <input type="submit" value="Add Comment" class="btn btn-primary">
</form>
@else
<p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register-user') }}">Register</a> to write comments on posts.</p>
@endif