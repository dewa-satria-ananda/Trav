<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'Follow';
    protected $primaryKey = 'FollowId';
    protected $fillable = [
        'userId',
        'followingUserId',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

}
