<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function contact(){
        return view('contact');
    }
    private function submitContact(){
        
    }
}
