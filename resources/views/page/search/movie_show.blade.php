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
            
            <div class="row mt-3 mb-3">
                <div class="offset-md-9 col-md-3">
                    <div class="d-flex text-right">
                        <div class="mr-2">
                                <form action="{{route('search.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="movie_id" value="{{$id}}">
                                    <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="観た" style="opacity:0.8;"><i class="fas fa-eye fa-2x"></i></button>
                                </form>
                        </div>
                        <div class="mr-2">
                            <form action="{{route('search.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="movie_id" value="{{$id}}">
                                    <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="これから観る" style="opacity:0.8;"><i class="fas fa-plus-square fa-2x pl-1 pr-1"></i></button>
                            </form>
                        </div>
                        
                    </div>
                </div>
                
            </div>
                    
        
            
            
        </div>
        
        <div class="" style="hieght:auto;margin-bottom:250px;">
            
            
            <div>
                
                <div class="p-2 bg-light text-white mb-2" style="height:40px;opacity:0.8;">
                    <p class="font-weight-bold text-dark">あらすじ</p>
                </div>
                    <div class="p-3">
                        <p>あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。
                        あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。あらすじがはいります。</p>
                    </div>
                
            </div>
            
            <div>
                
                <div class="p-2 bg-light text-white" style="height:40px;opacity:0.8;">
                    <p class="font-weight-bold text-dark">スコア・レビュー</p>
                </div>
                
                @if($reviews_counts == 0)
                    <div class="text-center mt-4">
                        <p>この映画のレビューは存在していません。</p>
                    </div>
                @else
                <div>
                    
                    @foreach($reviews as $review)
                        <div class="mt-3 border-bottom pb-3">
            
                            <div class="row">
                                    <div class="ml-4 col-md-1">
                                        <img src="{{asset('img/user_08.png')}}" style="height:40px;width:40px;" class="border rounded border-light">
                                    </div>
                                    <div class="col-md-7">
                                        <a href="{{route('user.show',$review->user->id)}}" class="text-dark">
                                           {{$review->user->name}}
                                        </a>
                                        <p>
                                            @for($i = 0; $i < $review->score; $i++)
                                                <i class="fas fa-star text-warning"></i>
                                            @endfor
                                            {{$review->score}}
                                        </p>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <a href="#" class="text-secondary" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                        
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            @if($review->user->id == Auth::user()->id)
                                            <a class="dropdown-item" href="{{route('review.edit',$review->id)}}"><i class="fas fa-edit"></i> 投稿を編集</a>
                                            <a class="dropdown-item  text-danger" href="#"><i class="fas fa-exclamation"></i> 投稿を削除する</a>
                                            @else
                                            <a class="dropdown-item" href="#"><i class="fas fa-comment-dots"></i> コメントする</a>
                                            @endif
                                        </div>
                                                
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="offset-md-1 col-md-10">
                                        <p>{{$review->content}}</p>
                                    </div>
                                </div>
                        
                        </div>
                    @endforeach
                    
                    
                </div>
                @endif
                
            </div>
            
        </div>
            
        
        @component('components.bottombar')
        @endcomponent
    </div>
@endsection
