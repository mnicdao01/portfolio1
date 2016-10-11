@extends('main')
@section('title', 'All Post')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Post</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-block btn-h1-spacing">Create a New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="row">
            <div class="col-md-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($posts as $post)
                     <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ strlen($post->body) >= 50 ? substr($post->body, 0, 50)." ..." : $post->body }}</td>
                        <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a> </td>
                     </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        </div>


    </div>

@endsection