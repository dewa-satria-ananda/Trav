<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    protected $table = 'likePost';
    protected $primaryKey = 'likeId';
    protected $fillable = [
        'userId',
        'postId',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'postId', 'postId');
    }
}
