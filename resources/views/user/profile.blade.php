@extends('master.master')


@section('content')
<div class="row">
    <div class="col-3 bg-primary">
        <div class="container profile_picture">
            @if($UserData['profile_picture'] != "")
                <img src="UserImages/{{ $UserData['profile_picture'] }}" class="rounded-circle" alt="Cinque Terre" width="150" height="150" >
            @else
                <img src="UserImages/no_image.png" class="rounded-circle" alt="Cinque Terre" width="200" height="200">
            @endif
        </div>
    </div>
<div class="col-9 ">
    <div class="container mt-3">
        <h2 class="display-3"> {{$UserData['full_name']}} </h2>
      </div>
      <div class="container">
            <br>
            <table class="table">
            <thead>
                <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{$UserData['first_name']}}</td>
                <td>{{$UserData['last_name']}}</td>
                <td>{{$UserData['email']}}</td>
                </tr>
            </tbody>
            </table>
      </div>

      <div class="container">
        <h4 class="display-4"> Blogs Uploade By {{$UserData['full_name']}}</h4>
          <br>
          <div class="container">
            <div class="card-deck">
                @php
                    $i = 1;
                @endphp
                @foreach ($UserData['getblogs'] as $blogs)
                    <div class="card" style="width:200px">
                        <h2 style="padding: 10px;" >{{ $blogs['name'] }}</h2>
                        @if($blogs['blog_pic'] == "")
                            <img class="card-img-top" src="UserImages/no_image.png" alt="Card image" style="width:100%">
                        @else
                        @php
                            $path = $blogs['blog_pic'];
                        @endphp
                            <img class="card-img-top" src="blogMedia/{{$path}}" alt="Card image" style="width:100%">
                        @endif
                        <div class="card-body">
                            <h6 class="card-title">Author: {{ $blogs['getuser']['full_name'] }} / 
                                <span class="card-title">Date: {{ $blogs['blog_date'] }}</span></h6>
                            <p class="card-text">{{ Str::limit(strip_tags($blogs['content']),120,'...')}}</p>
                            <a href="read/{{ $blogs['id'] }}" class="btn btn-primary">Read More...</a>
                        </div>
                    </div>
                    @if($i % 2 == 0)
                    <div style="flex-basis: 100%; height: 0;"></div>
                    @endif
                    @php
                        $i++
                    @endphp
                @endforeach
            </div>
          </div>
      </div>
</div>
@endsection