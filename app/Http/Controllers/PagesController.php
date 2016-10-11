<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PagesController extends Controller
{

    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();

        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){
        $fname = 'Mark';
        $lname = 'Nicdao';

        $aboutme['fullname'] = $fname . ' ' . $lname;
        $aboutme['email'] = "mnicdao01@gmail.com";

        return view('pages.about')->withAboutme($aboutme);
    }

    public function getContact(){
        return view('pages.contact');
    }

}
