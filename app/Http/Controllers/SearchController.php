<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\WatchMovie;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.search.index');
    }

    public function search_exe(Request $request)
    {
        

        $search_request = $request->input('search');
        
        
        //作品名・監督を探す
        $search_results = Movie::where('maker','LIKE','%'.$search_request.'%')
                                ->orwhere('name','LIKE','%'.$search_request.'%')
                                ->orderBy('created_at','desc')
                                ->get();
                           
        //監督を取得     
        $search_results_maker = $search_results->pluck('maker')->first();
        
        $search_results_counts = count($search_results);
        
        
        if(count($search_results) == 0){
            return redirect(route('search.index'))->with('search_miss','検索結果は０件でした');
        }
        
        return view('page.search.show',[
            'search_results' => $search_results,
            'search_results_counts' => $search_results_counts,
            'search_results_maker' => $search_results_maker
        ]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request);
        
        $repeat_movie = WatchMovie::where('movie_id',$request->movie_id)->get();
        
        $repeat_movie_count = count($repeat_movie); 
        
        // dd($repeat_movie_count);
        
        if($repeat_movie_count == 1){
            return redirect(route('search.show',$request->movie_id))->with('watch_miss','Miss');
        }
        
        $watch_movie = new WatchMovie();
        
        $watch_movie->user_id = $request->input('user_id');
        $watch_movie->movie_id = $request->input('movie_id');
        $watch_movie->save();
        
        return redirect(route('search.show',$watch_movie->movie_id))->with('watch_success','Good!!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        
        $movie = Movie::find($id);
        
        return view('page.search.movie_show',[
            'movie' => $movie,
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
