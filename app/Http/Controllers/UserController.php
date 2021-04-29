<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\blog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login_view()
    {
        if(!Auth::check())
        {
            return view('auth.login');
        }
        else{
            return redirect('/');
        }
    }

    public function register_view()
    {
        if(!Auth::check())
        {
            return view('auth.register');
        }
        else{
            return redirect('/');
        }
    }

    public function add_new_blog_view()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            return view('blog.add_new_blog',['UserData' => $user]);
        }
        else{
            return view('auth.login');
        }
    }

    public function profile_view()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $data = User::find($user['id']);
            $data->Getblogs;

            return view('user.profile',['UserData' => $data]);
        }
        else{
            return view('auth.login');
        }
    }

    public function Home()
    {
        $blogs = blog::all();
        foreach($blogs as $data)
        {
            $data->Getuser;
        }
        
        return view('home',['blogs' => $blogs]);
    }

    public function single_blog_view($id)
    {
        $blog = blog::find($id);
     
        $blog->Getuser;

        $blog->Getcomments;
        

        if(Auth::check())
        {
            $data = Auth::user();
            return view('blog.view_single_bloge',['data'=>$blog, 'loggined_user'=> $data]);
        }
        else
        {
            return view('blog.view_single_bloge',['data'=>$blog]);
        }
        
    }   
}
