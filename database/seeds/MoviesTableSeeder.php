<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $goutte = GoutteFacade::request('GET','https://filmarks.com/list/trend?page=3&vie');

        $names = array();

        $images = array();
        
        // $maker = "";
        
        
        $goutte->filter('.p-content-cassette__title')->each(function($node) use (&$names){
           
          $names[] = $node->text();
            
        });
        
        $goutte->filter('.p-content-cassette__jacket img')->each(function($node) use (&$images){
           
          $images[] = $node->attr('src');
            
        });
        
        // $goutte->filter('.p-profile__body h2')->each(function($node) use (&$maker){
           
        //   $maker = $node->text();
            
        // });
        
        
        
        
        foreach($names as $name_key => $name){
            
            foreach($images as $image_key => $image)
            {
                if($name_key == $image_key){
                    
                   DB::table('trends')->insert([
                        'name' => $name,
                        'img_url' => $image,
                    ]);
                    
                }
            }
            
            
        }
                    
                    
                    
             
            
            
        
        
    }
}
