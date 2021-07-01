@extends('layouts.app')

@section('content')
    <div class="bg-white border border-dark position-relative" style="height:auto;">
        
        
        <div class="container mt-3 border-bottom pb-3">
            
            <div class="row">
              <div class="col-md-2 text-center">
                  <img src="{{asset('img/user_08.png')}}" class="rounded-circle border border-dark img_size">
              </div>
              <div class="col-md-9 pt-2">
                  <h5>{{Auth::user()->name}}</h5>
                  <div class="mt-3 d-flex">
                      <a class="btn btn-outline-dark rounded-circle mr-2"><i class="fas fa-user"></i></a>
                      <a class="btn btn-outline-primary rounded-circle"><i class="fas fa-comments"></i></a>
                  </div>
                  <div class="text-right mt-2">
                      <a href="#" class="text-secondary" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></a>
                      
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i>  プロフィール編集</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i>  設定</a>
                      </div>
                  </div>
                </div>
            </div>
            
            <div class="row">
                <div class="offset-md-1 col-md-2">
                    <p><strong>5</strong><a href="#" class="text-dark">フォロワー</a></p>
                </div>
                <div class="col-md-3">
                    <p><strong>3</strong><a href="#" class="text-dark">フォロー</a></p>
                </div>
            </div>
            
                
                
            </div>
            
            <div class="container">
                <div class="row" style="height:60px;">
                    <div class="col-md-4 bg-warning text-center pt-3">
                        <p style="margin-bottom:0;">
                           <i class="fas fa-eye fa-2x"></i>
                        </p>
                        <p style="margin-bottom:0;">30</p>
                    </div>
                    <div class="col-md-4 bg-warning text-center pt-3" style="opacity:0.7;">
                        <p style="margin-bottom:0;">
                            <i class="fas fa-plus-square fa-2x"></i>
                        </p>
                        <p style="margin-bottom:0;">30</p>
                    </div>
                    <div class="col-md-4 bg-danger text-center pt-3"  style="opacity:0.4;">
                        <p style="margin-bottom:0;">
                            <i class="fas fa-heart fa-2x"></i>
                        </p>
                        <p style="margin-bottom:0;">30</p>
                    </div>
                </div>
            </div>
            
            <div class="container mt-3" style="height:auto;margin-bottom:100px;">
                    <div class="row ">
                        
                            @foreach($watch_movies as $watch_movie)
                                <div class="col-md-4 border pt-3">
                                    <div class="text-center">
                                        <a href="{{route('search.show',$watch_movie->movie->id)}}" >
                                            <img src="{{asset($watch_movie->movie->img_url)}}" style="width:180px;height:230px;">
                                        </a>
                                    </div>
                                    <div class="text-center mt-2">
                                        <p><a href="{{route('search.show',$watch_movie->movie->id)}}" class="text-dark">{{$watch_movie->movie->name}}</a></p>
                                    </div>
                                </div>
                            @endforeach
            
                    </div>
                </div>
            
            <div>
                
            </div>

       
        
        
        @component('components.bottombar')
        @endcomponent
        
    </div>
@endsection
