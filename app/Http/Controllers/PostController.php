<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request); //this is Die and Dump to show $request contents


        $this->validate($request, array(
            'title' => 'required|max:255',
            'title' => 'required|max:255',
            'slug' => 'required|alphadash|max:255|min:6',
            'category_id' => 'required|numeric',
            'body' => 'required'
        ));

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;


        $post->save();

        $post->tags()->sync($request->tags, false); //This code will sync up the associations

        Session::flash('success', 'Save Successfully!');


        return redirect()->route('posts.show', $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $post = Post::find($id);

        return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        $tagsAll = Tag::all();

        $cats = array();
        $tags = array();

        foreach($categories as $categories){
            $cats[$categories->id] = $categories->name;
        }

        foreach($tagsAll as $tagsAll){
            $tags[$tagsAll->id] = $tagsAll->name;
        }

        //
        return view('posts/edit')->withPost($post)->withCategories($cats)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);

        if($request->slug == $post->slug){
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alphadash|min:6|max:255|unique:posts.slug',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        }

        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags, true);
        }else{
            $post->tags()->sync([]);
        }



        Session::flash('success', 'Changes Were Saved Successfully');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'Deleted Successfully');

        return redirect()->route('posts.index');

    }
}
