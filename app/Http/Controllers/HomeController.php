<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Feature;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\Theme;

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
            'features'      => Feature::get(),
            'packages'      => Package::take(3)->get(),
            'testimonials'  => Testimonial::get(),
            'themes'        => Theme::take(9)->get()
        );
        return view('app.frontend.home.index', $data);
    }

    public function pages($slug)
    {
        $data = array(
            '' => '',
        );
        return view('app.frontend.home.index', $data);
    }
}
