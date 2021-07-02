@extends('layouts.app')

@section('content')
    <div class="bg-white border border-dark position-relative" style="height:auto;">
        
        
            <div class="container pb-3 border-bottom">
                <div class="p-3">
                     <i class="fas fa-user fa-2x p-2 border bg-secondary text-white"></i>
                </div>
                <div class="pl-3">
                    <p class="font-weight-bold">{{$search_results_maker}}</p>
                </div>
            </div>
            
            <div class="container pb-1 border-bottom">
                <div class="row p-2">
                    <div class="offset-md-6 col-md-6 text-right">
                        <a href="#" class="btn btn-primary pl-4 pr-4"><i class="fas fa-user-plus mr-2"></i>Fan!</a>
                    </div>
                </div>
            </div>
            
            <div class="mt-4" style="">
                
                <div class="text-center pb-1">
                    <p>映画</p>
                </div>
                
                <div class="bg-light container p-2" style="height:40px;">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fas fa-video mr-2"></i>{{$search_results_counts}}件ヒット
                        </div>
                    </div>
                </div>
                
                <div class="container mt-3" style="height:auto;margin-bottom:100px;">
                    <div class="row ">
                        
                        @foreach($search_results as $search_result)
                            <div class="col-md-4 border pt-3">
                                <div class="text-center">
                                    <a href="{{route('search.show',$search_result->id)}}">
                                        <img src="{{asset($search_result->img_url)}}" style="width:180px;height:230px;">
                                        
                                    </a>
                                </div>
                                <div class="text-center mt-2">
                                    <p><a href="{{route('search.show',$search_result->id)}}" class="text-dark">{{$search_result->name}}</a></p>
                                </div>
                            </div>
                        @endforeach
            
                    </div>
                </div>
                
            </div>
        
        
        
        @component('components.bottombar')
        @endcomponent
    </div>
@endsection
