<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionComment extends Model
{
    protected $table = 'discussionComment';
    protected $primaryKey = 'discussionCommentId';
    protected $fillable = [
        'userId',
        'discussionId',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    public function discussion()
    {
        return $this->belongsTo('App\Discussion', 'discussionId', 'discussionId');
    }
}
