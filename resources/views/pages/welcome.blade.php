@extends('main')
@section('title','Homepage')
@section('content')

        <div class="row">
            <div class="col-md-12">
               <div class="jumbotron">
                 <h1>Welcome to My Blog</h1>
                 <p class="lead">A Blog Portfolio</p>
                 <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ strlen($post->body) >= 300 ? substr($post->body,0,300)." ..." : $post->body }}</p>
                    <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>

                <hr>
            @endforeach


            </div>
            <div class="col-md-3 col-md-offset-1"><h2>Sidebar</h2></div>

        </div>

@endsection
