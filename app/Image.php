<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Image extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['filename', 'user', 'visibility'];

    public function numberOfLikes()
    {
      return Like::where('image_id','=',$this->id)->get()->count();
    }
    
    public function didAuthLike()
    {
        $user = Auth::user();
        if(!$user)
        {
            return '';
        }
        $like = Like::where('image_id','=',$this->id)->where('user_id','=',$user->id)->first();
        
        if($like) {
            return 'UN';
        } else { 
            return '';
        }
    }
}