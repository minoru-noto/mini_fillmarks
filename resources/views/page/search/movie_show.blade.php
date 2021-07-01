@extends('layouts.app')

@section('content')
    <div class="bg-white border border-dark position-relative" style="height:auto;">
        
                @if (session('watch_success'))
                    <div class="p-3 mb-3 mt-5 bg-success text-white w-50 mx-auto  rounded">
                        <div class="text-center">
                            <i class="fas fa-film"></i>  {{ session('watch_success') }}
                        </div>
                    </div>
                @endif
                @if (session('watch_miss'))
                    <div class="p-3 mb-3 mt-5 bg-danger text-white w-50 mx-auto  rounded">
                        <div class="text-center">
                            <i class="fas fa-film"></i>  {{ session('watch_miss') }}
                        </div>
                    </div>
                @endif
        
        <div class="container">
            <div class="p-3">
                <p class="font-weight-bold title_size">{{$movie->name}}</p>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset($movie->img_url)}}" class="show_movie_img " style="">
                </div>
                <div class="col-md-6">
                    <p>監督</p>
                    <div class="bg-light p-1 rounded mb-2">
                        <p class="pt-2">監督名</p>
                    </div>
                    <p>脚本</p>
                    <div class="bg-light p-1 rounded mb-2">
                        <p class="pt-2">脚本名</p>
                    </div>
                    <p>キャスト</p>
                    <div class="bg-light p-1 rounded ">
                        <p class="pt-2">キャスト名</p>
                    </div>
                    <div class="bg-light p-1 rounded mt-2">
                        <p class="pt-2">キャスト名</p>
                    </div>
                   <div class="mt-3 text-right">
                       <a href="#">もっと見る＞</a>
                   </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="offset-md-9 col-md-3">
                    <div class="d-flex text-right">
                        <div class="mr-2">
                                <form action="{{route('search.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="movie_id" value="{{$id}}">
                                    <button type="submit" class="btn btn-warning" style="opacity:0.8;"><i class="fas fa-eye fa-2x"></i></button>
                                </form>
                        </div>
                        <div>
                            <p><a href="#" class="btn btn-warning" style="opacity:0.8;"><i class="fas fa-plus-square fa-2x pl-1 pr-1"></i></a></p>
                        </div>
                    </div>
                </div>
                
            </div>
                    
        
            
            
        </div>
        
        <div class="" style="hieght:auto;margin-bottom:250px;">
            
            
            <div>
                
                <div class="p-2 bg-secondary text-white mb-2" style="height:40px;opacity:0.8;">
                    <p class="font-weight-bold text-dark">あらすじ</p>
                </div>
                    <div class="p-3">
                        <p>あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。
                        あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。</p>
                    </div>
                
            </div>
            
            <div>
                
                <div class="p-2 bg-secondary text-white" style="height:40px;opacity:0.8;">
                    <p class="font-weight-bold text-dark">スコア・レビュー</p>
                </div>
                
                <div>
                    
                    
                </div>
                
            </div>
            
        </div>
            
        
        @component('components.bottombar')
        @endcomponent
    </div>
@endsection
