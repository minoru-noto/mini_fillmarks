<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use App\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $watch_movies = Review::orderBy('created_at','desc')->get();
        $watch_movies->load('user','movie');
        
        // dd($watch_movies);
        
        return view('home',[
            'watch_movies' => $watch_movies
        ]);
    }
}
