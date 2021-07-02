<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        // dd($request->id);
        
        //同じ映画の２度目のレビューの場合の動作
        $same_review = Review::where('user_id',\Auth::user()->id)
                            ->where('movie_id',$request->id)
                            ->get();
        
        $same_review_counts = count($same_review);
        
        if($same_review_counts == 1) {
            
            return redirect(route('review.edit',$request->id));
            
        }
        
        //初めてみた映画のレビューの場合
        $movie_id = $request->id;
        
        return view('page.review.create',[
          'movie_id' => $movie_id
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //観た映画の初めてのレビュー・感想
        $review = new Review();
        
        $review->user_id = $request->input('user_id');
        $review->movie_id = $request->input('movie_id');
        $review->content = $request->input('content');
        $review->score = $request->input('score');
        $review->save();
        
        return redirect(route('user.index'))->with('review_success','レビューを投稿しました。');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        
        
        $review = Review::where('movie_id',$id)
                        ->where('user_id',\Auth::user()->id)
                        ->first();
                        
        $review->load('user','movie');
        

        return view('page.review.edit',[
            'review' => $review
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // dd($request);
        
        $review = Review::find($id);
        
        $review->user_id = $request->input('user_id');
        $review->movie_id = $request->input('movie_id');
        $review->content = $request->input('content');
        $review->score = $request->input('score');
        $review->update();
        
        return redirect(route('user.index'))->with('edit_review_success','レビューを編集しました。');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
