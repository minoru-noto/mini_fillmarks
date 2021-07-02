@extends('layouts.app')

@section('content')
    <div class="bg-white border border-dark position-relative" style="height:700px;">
        
        <form action="{{route('review.store')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="movie_id" value="{{$movie_id}}">

              <div class="container mt-4">
                  
                  <div class="row border-bottom pb-2">
                      
                      <div class="col-md-2">
                          <a href="#" class="text-dark"><i class="fas fa-times fa-2x"></i></a>
                      </div>
                      
                      <div class="col-md-7 text-center">
                          <p class="font-weight-bold title_size">レビュー</p>
                      </div>
                      
                      <div class="col-md-3 text-right">
                          <button type="submit" class="btn btn-info">投稿</button>
                      </div>
                      
                  </div>
                  
                   </div>
                  
                  <div class="bg-light mb-2 p-3 border-bottom">
                      
                    <select name="score" class="form-select form-control">
                      <option selected>↓ スコアを選択してください</option>
                      <option value="1" class="text-warning">★</option>
                      <option value="2" class="text-warning">★★</option>
                      <option value="3" class="text-warning">★★★</option>
                      <option value="4" class="text-warning">★★★★</option>
                    　<option value="5" class="text-warning">★★★★★</option>
                    </select>
                    
                  </div>
                  
                  <div class="container">
                      
                      <div class="row">
                          <div class="col-md-3 text-center">
                              <div class="border-bottom p-3 bg-light">
                                  <p><a href="#"><i class="far fa-file-alt fa-2x"></i></a></p>
                                  <p class="mb-0">鑑賞記録</p>
                              </div>
                              <div class="border-bottom p-3 bg-light">
                                  <p><a href="#"><i class="fas fa-exclamation-triangle fa-2x"></i></a></p>
                                  <p class="mb-0">ネタバレ</p>
                              </div>
                          </div>
                          <div class="col-md-9 border-left">
                              <textarea  style="border:none;" class="form-control" name="content" rows="18" placeholder="ここに感想やレビューをお書きください。レビュー未記入でも投稿できます。"></textarea>
                          </div>
                      </div>
                      
                  </div>
                  
                  
                  
            
              
              
        </form>
            
        
        @component('components.bottombar')
        @endcomponent
    </div>
@endsection
