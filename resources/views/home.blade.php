@extends('layouts.app')

@section('content')
    <div class="bg-white border border-dark position-relative" style="height:auto;">
        
        
        <div style="height:auto;margin-bottom:100px;">
        
        
        @foreach($watch_movies as $watch_movie)
        <div class="mt-3 border-bottom pb-3">
            
            <div class="row">
                <div class="ml-4 col-md-1">
                    <img src="{{asset('img/user_08.png')}}" style="height:50px;width:50px;" class="border rounded border-light">
                </div>
                <div class="col-md-7">
                    <a href="" class="text-dark">
                      {{$watch_movie->user->name}}
                    </a>
                    <p class="text-muted text-mimi">{{$watch_movie->created_at->format('Y年m月d日')}}</p>
                </div>
            </div>
            
            <div class="container mt-3 ml-2">
                
                <div class="row mb-5">
                    <div class="col-md-9">
                            <a href="{{route('search.show',$watch_movie->movie_id)}}" class="text-dark">
                             <p class="font-weight-bold mb-0">{{$watch_movie->movie->name}}</p>
                            </a>
                            <p>
                                @for($i = 0; $i < $watch_movie->score; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                                {{$watch_movie->score}}
                            </p>
                            <div>
                                <p class="text-size">{{$watch_movie->content}}</p>
                            </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('search.show',$watch_movie->movie_id)}}" class="text-dark">
                        <img src="{{$watch_movie->movie->img_url}}" class="border" style="width:100px;height:140px;">
                        </a>
                    </div>
                </div>
                
            </div>
            
            <div class="border-top pt-1">
                
                <div class="mt-2 container">
                    
                    <div class="row">
                        <div class="col-md-2 ml-3">
                            <a href="#" class="text-secondary"><i class="far fa-heart mr-1"></i>いいね！</a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="text-secondary">
                                <i class="far fa-comment-alt mr-1"></i>コメント
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
      @endforeach
        
        
    </div>
    
        
        
        
        
        @component('components.bottombar')
        @endcomponent
    </div>
@endsection
