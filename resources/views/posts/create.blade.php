@extends('main')
@section('title', 'New Post')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Post A New Blog</h1>
        <hr>
            {!! Form::open(array('route' => 'posts.store')) !!}
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null,  array('class' => 'form-control', 'placeholder' => 'Title please..'))  !!}

                 {!! Form::label('body', 'Post Body:') !!}
                 {!! Form::textarea('body', null,  array('class' => 'form-control', 'placeholder' => 'Title please..'))  !!}

                 {!! Form::submit('Create New Post', array('class' => 'btn btn-success btn-block'))!!}
            {!! Form::close() !!}


        </div>
    </div>


@endsection