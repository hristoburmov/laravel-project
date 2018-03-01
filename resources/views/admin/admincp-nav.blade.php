<h3 class="mt-3" style="text-align: center"> Admin CP </h3>

<ul class="nav nav-tabs nav-fill mt-3">
    <li class="nav-item"><a class="nav-link {{ (strpos(\Request::route()->getName(), 'admin.categories') > -1) ? 'active' : '' }}" href="{{ route('admin.categories') }}">Categories</a></li>
    <li class="nav-item"><a class="nav-link {{ (strpos(\Request::route()->getName(), 'admin.posts') > -1) ? 'active' : '' }}" href="{{ route('admin.posts') }}">Posts</a></li>
    <li class="nav-item"><a class="nav-link {{ (strpos(\Request::route()->getName(), 'admin.comments') > -1) ? 'active' : '' }}" href="{{ route('admin.comments') }}">Comments</a></li>
</ul>