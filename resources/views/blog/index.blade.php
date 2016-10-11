@extends('main')
@section('title', 'Blog Archive')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Blog Archive</h1>
        </div>

    </div>

    @foreach($post as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
             <h2>{{ $post->title }}</h2>
             <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
             <p>{{ strlen($post->body) >= 300 ? substr($post->body,0,300).' ...' : ""}}</p>
             <a href="{{ route('blog.single', $post->slug) }}">Read More</a>
        </div>
    </div>

    @endforeach

@endsection