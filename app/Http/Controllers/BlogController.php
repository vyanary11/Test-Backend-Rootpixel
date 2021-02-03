<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->tags!=""){
            $blog = Blog::paginate(9);
        }else if(request()->search!=""){
            $blog = Blog::paginate(9);
        }else{
            $blog = Blog::paginate(9);
        }

        $data = array(
            'blogs' => $blog,
        );
        return view('app.frontend.blog.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstorfail();
        $data = array(
            'blog'          => $blog,
            'previous_blog' => Blog::where('created_at', '<', $blog->created_at)->where('id','!=',$blog->id)->where('user_id', $blog->admin_id),
            'next_blog'     => Blog::where('created_at', '>', $blog->created_at)->where('id','!=',$blog->id)->where('user_id', $blog->admin_id)
        );
        return view('app.frontend.blog.post', $data);
    }
}
