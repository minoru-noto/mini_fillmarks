<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchMovie extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'movie_id', 
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    
    public function movie()
    {
        return $this->belongsTo('App\Movie','movie_id','id');
    }
    
}
