@extends('main')
@section('title', 'New Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Post A New Blog</h1>
        <hr>
            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null,  array('class' => 'form-control', 'placeholder' => 'Title goes here...', 'required' => 'true', 'maxlength' => '255'))  !!}

                {!! Form::label('slug', 'Slug:') !!}
                {!! Form::text('slug', null,  array('class' => 'form-control', 'placeholder' => 'Slug goes here', 'required' => 'true', 'maxlength' => '255', 'minlength' => '6'))  !!}

                {!! Form::label('category', 'Category:') !!}
                <select class="form-control" name="category_id">
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach

                </select>


                {!! Form::label('body', 'Post Body:') !!}
                {!! Form::textarea('body', null,  array('class' => 'form-control', 'placeholder' => 'Your message here...', 'required' => 'true'))  !!}

                {!! Form::label('tags', 'Tags:') !!}
                <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>

                {!! Form::submit('Create New Post', array('class' => 'btn btn-success btn-block'))!!}
            {!! Form::close() !!}


        </div>
    </div>


@endsection

@section('scripts')
    {!! Html::script('js/select2.full.js') !!}
    <script>
        $('.select2-multi').select2();
    </script>
@endsection