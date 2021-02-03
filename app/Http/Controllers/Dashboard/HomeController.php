<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

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
        $data = [
            'blog_count' => Blog::get()->count(),
            'user_count'  => User::get()->count()
        ];
        return view('app.dashboard.home', $data);
    }

    public function profile()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('app.dashboard.profile', $data);
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'email'             => 'unique:users',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->profile_picture!=null){
            $request->validate([
                'profile_picture'   => 'mimes:jpeg,png,jpg,gif|max:5052',
            ]);
            $extension = $request->profile_picture->extension();
            $filename = Str::random(10).".".$extension;
            $request->profile_picture->storeAs('/public/upload/user', $filename);
            $user->profile_picture=$filename;
        }
        if($user->save()){
            return redirect(route('dashboard.profile'))->with('message', [
                'status'    => 'success',
                'message'   => 'Profile has been updated!!'
            ]);
        }
    }
}
