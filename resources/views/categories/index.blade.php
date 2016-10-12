@extends('main')
@section('title', ' Categories')
@section('content')
    <div class="row">
           <div class="col-md-12">
                <h1>Categories</h1>
           </div>
    </div>
    <div class="row">

        <div class="col-md-8">

            <table class="table table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td></td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST'])!!}
                 <h2>New Category</h2>

                 {{ Form::label('name', 'Name:') }}
                 {{ Form::text('name',null ,['class' => 'form-control']) }}

                 {{ Form::submit('Create New Category', ['class'=>'btn btn-primary btn-block']) }}
                {!! Form::close()!!}
            </div>
        </div>
    </div>

@endsection