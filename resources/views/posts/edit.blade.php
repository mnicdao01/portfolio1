@extends('main')
@section('title', 'Modify Post')
@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')



    <div class="row">
            <div class="col-md-8">
               {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])!!}

               {!! Form::label('title', 'Title:') !!}
               {!! Form::text('title', null, array('class' => 'form-control', 'required' => 'true', 'maxlength' => '255'))  !!}

               {!! Form::label('slug', 'Slug:') !!}
               {!! Form::text('slug', null, array('class' => 'form-control', 'required' => 'true', 'maxlength' => '255', 'minlength'=>'6'))  !!}

               {!! Form::label('category_id', 'Category:') !!}
               {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])  !!}

               {!! Form::label('body', 'Post Body:') !!}
               {!! Form::textarea('body', null,  array('class' => 'form-control', 'required' => 'true'))  !!}

                {!! Form::label('tags', 'Tags:') !!}
                {!! Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=>'multiple'])!!}
            </div>
            <div class="col-md-4">
                <div class="well">
                       <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                       </dl>
                       <dl class="dl-horizontal">
                            <dt>Last Updated:</dt>
                            <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                       </dl>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id) ,array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        {{--{!! Html::linkRoute('posts.update', 'Save Changes', array($post->id) ,array('class'=>'btn btn-success btn-block')) !!}--}}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

@endsection

@section('scripts')
    {!! Html::script('js/select2.full.js') !!}
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()); !!}).trigger('change');
    </script>
@endsection