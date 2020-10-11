@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Posts
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch', 'files' => true]) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('image_url', 'Image Url:') !!}
                        <label class="image__file-upload"> Choose
                            {!! Form::file('image_url',['class'=>'d-none']) !!}
                        </label>
                    </div>
                    <div class="clearfix"></div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('posts.index') }}" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="box box-primary mt-5">
            <div class="box-body">
                <!-- Image Url Field -->
                @include('posts.show_fields')
            </div>
        </div>
    </div>
@endsection
