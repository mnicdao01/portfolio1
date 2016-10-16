@extends('main')
@section('title', ' Tags')
@section('content')
    <div class="row">
           <div class="col-md-12">
                <h1>Tags</h1>
           </div>
    </div>
    <div class="row">

        <div class="col-md-8">

            <table class="table table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tag Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td></td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST'])!!}
                 <h2>New Tag</h2>

                 {{ Form::label('name', 'Name:') }}
                 {{ Form::text('name',null ,['class' => 'form-control']) }}

                 {{ Form::submit('Create New Tag', ['class'=>'btn btn-primary btn-block']) }}
                {!! Form::close()!!}
            </div>
        </div>
    </div>

@endsection