<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function getIndex(){
        return view('pages.welcome');
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
