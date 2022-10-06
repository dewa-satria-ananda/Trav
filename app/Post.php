<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'postId';
    protected $fillable = [
        'userId',
        'title',
        'image',
        'description',
        'like',
        'comment_count'
    ];
    
    public function user(){
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    //
}
