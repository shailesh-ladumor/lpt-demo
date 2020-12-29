<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a href="{{ route('posts.index') }}"><i class="fa fa-edit"></i><span>Posts</span></a>
</li>

<li class="{{ Request::is('articles*') ? 'active' : '' }}">
    <a href="{{ route('articles.index') }}"><i class="fa fa-edit"></i><span>Articles</span></a>
</li>

