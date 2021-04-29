@extends('master.master')

@section('content')
    <div class="container"><br> <br>
        <div class="card-deck">
            @for ($i = 0; $i<count($blogs) ;$i++)
                
                    <div class="card" style="width:400px">
                        <h2 style="padding: 10px;" >{{ $blogs[$i]['name'] }}</h2>
                        @if($blogs[$i]['blog_pic'] == "")
                            <img class="card-img-top" src="UserImages/no_image.png" alt="Card image" style="width:100%">
                        @else
                        @php
                            $path = $blogs[$i]['blog_pic'];
                        @endphp
                            <img class="card-img-top" src="blogMedia/{{$path}}" alt="Card image" style="width:100%">
                        @endif
                    
                        <div class="card-body">
                            <h6 class="card-title">Author: {{ $blogs[$i]['getuser']['full_name'] }} / 
                                <span class="card-title">Date: {{ $blogs[$i]['blog_date'] }}</span></h6>
                            <p class="card-text">{{ Str::limit(strip_tags($blogs[$i]['content']),120,'...')}}</p>
                            <a href="/read/{{ $blogs[$i]['id'] }}" class="btn btn-primary">Read More...</a>
                        </div>
                    </div>
                    @if(($i+1) % 3 == 0)
                        <div style="flex-basis: 100%; height: 0;"></div>
                    @endif
                    <br>
            @endfor
        </div>
    </div>
@endsection