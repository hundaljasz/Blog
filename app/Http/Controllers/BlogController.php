<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\blog;
use App\Models\comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator::make($request->all(),[
            'first_name'        =>      'required',
            'last_name'         =>      'required',
            'email'             =>      'bail|required|email',
            'password'          =>      'bail|required|min:6',
            'confirm_password'  =>      'bail|required|same:password',
        ]);

        if(count($validator->errors()) != 0)                        //If validations fail this condition will execute
        {
            return ['errors'=>$validator->errors()];                 //Return Errors 
        }
        else
        {
            $data = new User;
            $data->first_name=$request->input('first_name');
            $data->last_name=$request->input('last_name');
            $data->full_name=$request->input('first_name'). " ". $request->input('last_name');
            $data->email=$request->input('email');
            $data->password=Hash::make($request->input('password'));
            if(!empty($request->profile))
            {
                $imageName = $request->input('first_name')."_". $request->input('last_name').time().'.'.$request->profile->extension();
                $request->profile->move(public_path('UserImages'), $imageName);
                $data->profile_picture=$imageName;
            }
            $user = $data->save();
            if($user) {
                return "success";
            }
            else {
                return "fail";
            }
            
        }
    }

    public function login(Request $request) {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required|min:6"
        ]);

        $userCredentials = $request->only('email', 'password');

        // check user using auth function
    
        if (Auth::attempt($userCredentials)) {
            return "success";
        }

        else {
            return "fail";
        }
    }

    // ------------------- [ User logout function ] ----------------------
    public function logout(Request $request ) 
    {
        $request->session()->flush();

        Auth::logout();

        return Redirect('login');
    }


    // ------------------ [ User Dashboard Section ] ---------------------
    public function dashboard() {

        // check if user logged in
        if(Auth::check()) {
            return view('welcome');
        }

        return redirect::to("user-login")->withSuccess('Oopps! You do not have access');
    }   

    public function AddNewBlog(Request $request){
        $data = new blog;
        $data -> name = $request->input('title');
        $data -> content = $request->input('blog');
        $data -> category = $request->input('category');
        $data -> blog_date = $request->input('date');
        $data -> author_id = $request->input('author_id');
        if(!empty($request->blog_picture))
        {
            $imageName = time().'.'.$request->blog_picture->extension();
            $request->blog_picture->move(public_path('blogMedia'), $imageName);
            $data->blog_pic=$imageName;
        }
        $data -> save();

        if($data)
        {
            return ['response' => 'success'];
        }
        else{
            return ['response' => 'fail'];
        }
    }
    function add_new_comment(Request $request)
    {
        $data = new comment;
        $data -> blog_id = $request->input('blog_id');
        $data -> email = $request->input('mail');
        $data -> comment = $request->input('comment');
        $data -> username = $request->input('name');

        if($data->save())
        {
            return ['response' => 'success', 'data' => $data];
        }
        else
        {
            return ['response' => 'fail'];
        }
    }

    function add_new_like()
    {
        $data = $_GET['like'];

        $blog = blog::find($data);
        $likes = $blog['likes']+1;

        $blog -> likes = $likes;
        
        if($blog->save())
        {
            return ['response' => $blog];
        }
        else{
            return ['response' => 'fail'];
        }
        
    }

    function remove_like()
    {
        $data = $_GET['like'];

        $blog = blog::find($data);
        $likes = $blog['likes']-1;

        $blog -> likes = $likes;

        if($blog->save())
        {
            return ['response' => $blog];
        }
        else{
            return ['response' => 'fail'];
        }
    }

    function category_blogs($name)
    {
        $blogs = blog::where('category',$name)->get();
        if(count($blogs)==0)
        {
            return view('blog.category_blogs',['response' => "fail",'data'=>"Sorry No Blog Found For ".$name." Category"]);
        }
        else{
            foreach($blogs as $data)
            {
                $data->Getuser;
            }
            return view('blog.category_blogs',['response' =>'success' ,'data' => $blogs]);
        }
    }

    function search_blog(Request $request)
    {
        $blogs = blog::where('name','LIKE',"%{$request->input('search')}%")->get();

        if(count($blogs) == 0)
        {
            return ['response' => 'fail'];
        }
        else{
            foreach($blogs as $blog)
            {
                $blog->Getuser;
            }
            return ['response' => 'success', 'data' =>$blogs];
        }
    }
}