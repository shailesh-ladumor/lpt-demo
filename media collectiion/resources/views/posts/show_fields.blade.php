<!-- Name Field -->
<div class="form-group">
    <span><strong>{{ $post->name }}'s Media Gallery</strong></span>
</div>

<div class="row">
    @foreach($post->getMedia('posts') as $media)
        <div class="col-sm-1">
            <img height="100px" src="{{$media->getUrl() }}"/>
        </div>
    @endforeach
</div>
