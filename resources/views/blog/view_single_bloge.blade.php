@extends('master.master')

@section('content')
    @php
        $path = $data['blog_pic'];
    @endphp
    <div class="container mt-3">
      <h2 class="display-3"> {{$data['name']}} </h2>
      <h4><small>Author: {{ $data['getuser']['full_name'] }} / </small><small>Category: {{$data['category']}} / </small><small><i>Posted on {{ $data['blog_date'] }}</i></small></h4>
      <br>
    </div>
  <div class="container">
    <img class="img-fluid mx-auto d-block" src="{!! url('blogMedia/'.$path) !!}"  width="950" height="550" >
  </div>
  <div class="container">
    {{-- <i class="fa fa-thumbs-up add_like remove_like" data-ID="{{ $data['id'] }}"></i><span class="text-danger" id="blog_likes"> {{ $data['likes'] }}</span> --}}
    <br>
    <p>{{ $data['content'] }} </p>
    <div class="container mt-3">
      <div class="media border p-3">
        @if ($data['getuser']['profile_picture'] == "")
        <img src="{!! url('UserImages/no_image.png') !!}" alt="{{ $data['getuser']['full_name'] }}" class="mr-3 mt-3 rounded-circle" style="width:60px;">
        @else
        <img src="{!! url('UserImages/'.$data['getuser']['profile_picture']) !!}" alt="{{ $data['getuser']['full_name'] }}" class="mr-3 mt-3 rounded-circle" style="width:60px;">
        @endif
        <div class="media-body">
          <h4>Author: {{ $data['getuser']['full_name'] }} <small><i>Posted on {{ $data['blog_date'] }}</i></small></h4>
          <p>{{ $data['getuser']['email'] }}</p>      
        </div>
      </div>
    </div>
  </div>
  <br><br>

  


  <div class="container comments">
    <h3 class="display-5">Comments</h3>
    @foreach ($data['getcomments'] as $data)
      <div class="container mt-3">
        <div class="media border p-3">
          <div class="media-body">
            <h4>{{$data['username']}} <small><i>Posted on {{$data['created_at']}}</i></small></h4>
            <p>{{$data['comment']}}</p>      
          </div>
        </div>
      </div>
    @endforeach


  </div>
  <br><br>
<div class="container ">
  <h3 class="display-5">Add Comment</h3>
    <form id="comments_form">
      @csrf
      <input type="hidden" name="blog_id" id="blog_id" value="{{ $data['id'] }}">
      <div class="form-group">
        <input type="hidden" class="form-control" id="mail" placeholder="name@example.com" name="mail" @auth
          value="{{$loggined_user['email']}}" readonly="readonly"
        @endauth>
        <small class="text-danger" id="comment_email_error">Email Field Cannot Be Empty</small>
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" id="name" placeholder="John Doe" name="name" @auth
        value="{{$loggined_user['full_name']}}" readonly="readonly"
      @endauth >
        <small class="text-danger" id="comment_name_error">Name Field Cannot Be Empty</small>
      </div>
      <div class="form-group">
        <label for="comment">Comment</label>
        <textarea class="form-control" id="comment" rows="3" name="comment" placeholder="Comment Here!"></textarea>
        <small class="text-danger" id="comment_error">Comment Field Cannot Be Empty</small>
      </div>
      @auth
        <button type="submit" class="btn btn-primary">Submit</button>
      @endauth
      @guest
      <button class="btn btn-primary login_first">Submit</button>
      @endguest
    </form>
</div> 
<br><br>
@endsection
