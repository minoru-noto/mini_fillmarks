<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WatchMovie;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $watch_movies = WatchMovie::where('user_id',\Auth::user()->id)->get();
        $watch_movies->load('movie');
        
        $watch_movies_count = count($watch_movies);
        
        return view('page.user.index',[
            'watch_movies' => $watch_movies,
            'watch_movies_count' => $watch_movies_count
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);
        
        $watch_movies = WatchMovie::where('user_id',$id)->get();
        $watch_movies->load('movie');
        
        $watch_movies_count = count($watch_movies);
        
        return view('page.user.show',[
            'watch_movies' => $watch_movies,
            'watch_movies_count' => $watch_movies_count,
            'user' => $user
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
