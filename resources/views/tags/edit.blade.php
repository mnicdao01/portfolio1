@extends('main')
@section('title', 'Edit Tag')
@section('content')
    <div class="row">
        <h1>Tag</h1>
        <hr>
    </div>
    {{ Form::model($tag, ['route' => ['tags.update', $tag->id],'method' => 'PUT']) }}
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, ['class'=>'form-control']) }}
    {{ Form::submit('Save Changes', ['class'=>'btn btn-primary btn-h1-spacing']) }}
    {{ Form::close() }}

@endsection