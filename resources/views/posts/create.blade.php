@extends('main')
@section('title', 'New Post')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Post A New Blog</h1>
        <hr>
            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null,  array('class' => 'form-control', 'placeholder' => 'Title goes here...', 'required' => 'true', 'maxlength' => '255'))  !!}

                 {!! Form::label('body', 'Post Body:') !!}
                 {!! Form::textarea('body', null,  array('class' => 'form-control', 'placeholder' => 'Your message here...', 'required' => 'true'))  !!}

                 {!! Form::submit('Create New Post', array('class' => 'btn btn-success btn-block'))!!}
            {!! Form::close() !!}


        </div>
    </div>


@endsection