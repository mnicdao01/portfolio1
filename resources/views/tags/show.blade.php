@extends('main')
@section('title', ' Marketing Tags')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} <small>{{$tag->post()->count()}} Posts </small> </h1>
         </div>
         <div class="col-md-2 col-md-offset-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-h1-spacing btn-block">Edit</a>
         </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tag->post as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                           @foreach($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @endforeach
                         </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>


@endsection