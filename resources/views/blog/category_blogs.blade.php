@extends('master.master')

@section('content')
    @if ($response == "fail")
        <h2 class="display-3"> {{ $data }} </h2>
    @else
    <div class="container"><br> <br>
        <div class="card-deck">
            @for ($i = 0; $i<count($data) ;$i++)
                
                    <div class="card" style="width:400px">
                        <h2 style="padding: 10px;" >{{ $data[$i]['name'] }}</h2>
                        @if($data[$i]['blog_pic'] == "")
                            <img class="card-img-top" src="UserImages/no_image.png" alt="Card image" style="width:100%">
                        @else
                        @php
                            $path = $data[$i]['blog_pic'];
                        @endphp
                            <img class="card-img-top" src="{!! url('blogMedia/'.$path) !!}" alt="Card image" style="width:100%">
                        @endif
                    
                        <div class="card-body">
                            <h6 class="card-title">Author: {{ $data[$i]['getuser']['full_name'] }} / 
                                <span class="card-title">Date: {{ $data[$i]['blog_date'] }}</span></h6>
                            <p class="card-text">{{ Str::limit(strip_tags($data[$i]['content']),120,'...')}}</p>
                            <a href="/read/{{ $data[$i]['id'] }}" class="btn btn-primary">Read More...</a>
                        </div>
                    </div>
                    @if(($i+1) % 3 == 0)
                        <div style="flex-basis: 100%; height: 0;"></div>
                    @endif
                    <br>
            @endfor
        </div>
    </div>
    @endif
@endsection