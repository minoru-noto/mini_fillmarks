@extends('layouts.app')

@section('content')
    <div class="bg-white border border-dark position-relative" style="height:auto;">
        
        <div class="mt-5 border-bottom pb-2">
            
            <div class="text-center">
                <h4 class="font-weight-bold mb-4"><i class="fas fa-video"></i>  今話題のおすすめ映画</h4>
                <p>今Filmarksで話題になっているおすすめ映画。<br>直近のユーザーの注目度やアクションを元に集計しています。</p>
            </div>
            
        </div>
        
        <div class="container mt-3" style="height:auto;margin-bottom:100px;">
            
            <div class="row ">
                
                @foreach($trends as $trend)
                    <div class="col-md-4 border pt-3">
                        <div class="text-center">
                            <a href="{{route('search.show',$trend->id)}}">
                                <img src="{{asset($trend->img_url)}}" style="width:180px;height:230px;">
                                
                            </a>
                        </div>
                        <div class="text-center mt-2">
                            <p><a href="{{route('search.show',$trend->id)}}" class="text-dark">{{$trend->name}}</a></p>
                        </div>
                    </div>
                @endforeach
    
            </div>
            
            <div class="p-4 container row">
                
                <div class="offset-md-8 col-md-4">
                    {{ $trends->links() }}
                    
                </div>
            </div>
            
            
        </div>
        
        
        @component('components.bottombar')
        @endcomponent
        
    </div>
@endsection
