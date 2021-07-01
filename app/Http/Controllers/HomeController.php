<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade as GoutteFacade;

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
        
        // $goutte = GoutteFacade::request('GET','https://filmarks.com/people/53361');

        // $names = array();

        // $images = array();
        
        // $maker = "";
        
        
        // $goutte->filter('.c-content-item__title a')->each(function($node) use (&$names){
           
        //   $names[] = $node->text();
            
        // });
        
        // $goutte->filter('.c-content-item__jacket img')->each(function($node) use (&$images){
           
        //   $images[] = $node->attr('src');
            
        // });
        
        // $goutte->filter('.p-profile__body h2')->each(function($node) use (&$maker){
           
        //   $maker = $node->text();
            
        // });
        
        
        
        return view('home');
    }
}
