<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array(
            'blogs' => Blog::take(6)->get(),
        );
        return view('app.frontend.home.index', $data);
    }

}
