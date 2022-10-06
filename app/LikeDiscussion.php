<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDiscussion extends Model
{
    protected $table = 'likeDiscussion';
    protected $primaryKey = 'likeDiscussionId';
    protected $fillable = [
        'userId',
        'discussionId',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    public function discussion()
    {
        return $this->belongsTo('App\discussion', 'discussionId', 'discussionId');
    }
}
