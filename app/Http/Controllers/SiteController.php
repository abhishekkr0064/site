<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('index');
    }
    public function TermsConditions(){
        return view('pages.terms-conditions');
    }
    public function Contact(){
        return view('pages.contact-us');
    }
    public function AboutUs(){
        return view('pages.about-us');
    }public function feedback(){
        return view('pages.feedback');
    }
}
