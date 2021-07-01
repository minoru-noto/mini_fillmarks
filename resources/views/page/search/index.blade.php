@extends('layouts.app')

@section('content')
    <div class="bg-white border border-dark position-relative" style="height:700px;">
        
        
        
            <div style="">
                
                
                    
                <div class="container mt-5">
                    <div class="text-center">
                        <h5>検索</h5>
                        
                    </div>
                </div>
               
               
               <!-----------------------------検索フォーム-------------------------------->
               <div class="container">
                <br/>
                	<div class="row justify-content-center">
                        <div class="col-12 col-md-12 col-lg-12">
                            
                            <form action="{{route('search.exe')}}" method="POST" class="card card-sm">
                                @csrf
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="映画・ドラマ・アニメ・キャスト・監督など">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">検索</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                            
                        </div>
                        <!--end of col-->
                    </div>
                </div>  
            </div>
    
                @if (session('search_miss'))
                    <div class="p-3 mb-3 mt-5 bg-danger text-white w-50 mx-auto  rounded">
                        <div class="text-center">
                        <i class="fas fa-search-minus"></i>  {{ session('search_miss') }}
                        </div>
                    </div>
                @endif
        
        
        
        @component('components.bottombar')
        @endcomponent
    </div>
@endsection
