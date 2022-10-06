<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $table = 'postComment';
    protected $primaryKey = 'postCommentId';
    protected $fillable = [
        'userId',
        'postId',
        'text',

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
