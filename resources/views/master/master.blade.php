<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaskirat Blog's</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/">Jaskirat Blog's</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/add_new_blog">Add Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/profile">Profile</a>
            </li>            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/category/Travel">Travel</a>
                <a class="dropdown-item" href="/category/Marketing">Marketing</a>
                <a class="dropdown-item" href="/category/Wordpress">Wordpress</a>
                <a class="dropdown-item" href="/category/Technology">Technology</a>
                <a class="dropdown-item" href="/category/Science">Science</a>
                <a class="dropdown-item" href="/category/PHP">PHP</a>
                <a class="dropdown-item" href="/category/Python">Python</a>
                <a class="dropdown-item" href="/category/Java">Java</a>
            </li>
            @auth
               <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
            @endauth
            @guest
              <li class="nav-item">
                <a class="nav-link" href="/login">Login/Sign-Up</a>
              </li>
            @endguest
          </ul>
          <form class="form-inline search-blog">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Search Blog's" aria-label="Search" name="search" id="search">
            <button class="btn btn-success my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#myModal">Search</button>
          </form>
          <small class="text-warning" id="search_error">Search Field Cannot Be Empty</small>
        </div>
        <input type="hidden" name="url" id="url" value="{!! url('blogMedia/') !!}">
      </nav>
      
    <div class="container-fluid">

      
<div class="container">
  <!-- Button to Open the Modal -->

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Jaskirat Blog's</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

        @yield('content')
    </div>

<script src="{{ URL::asset('js/register.js') }}"></script>
<script src="{{ URL::asset('js/login.js') }}"></script>
<script src="{{ URL::asset('js/blog_upload.js') }}"></script>
<script src="{{ URL::asset('js/comments.js') }}"></script>
<script src="{{ URL::asset('js/like_count.js') }}"></script>
<script src="{{ URL::asset('js/search_blog.js') }}"></script>
</body>
</html>
