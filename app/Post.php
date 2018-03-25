<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title','slug','author_id','excerpt','content'];

    function getImagePostAttribute(){
        $imgPath = "";
        if ($this->image != null){
            if (file_exists(public_path('img/'.$this->image))){
                $imgPath = '/img/'.$this->image;
            }
        }
        return $imgPath;
    }

    function getDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    function author(){
        return $this->belongsTo(User::class);
    }

    function scopeLatestFirst($query){
        return $query->orderBy('created_at','DESC');
    }

}
