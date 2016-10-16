<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
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

    public function postContact(Request $request){
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email",
            "subject" => "required|max:255|min:10",
            "message" => "required|min:5"
        ]);

        $data = array(
            "email" => $request->email,
            "subject" => $request->subject,
            "bodyMessage" => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('reply-dev@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'The email has been sent');

        return redirect()->route('pages.contact');
    }

}
