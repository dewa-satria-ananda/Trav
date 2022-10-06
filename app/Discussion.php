<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $table = 'discussion';
    protected $primaryKey = 'discussionId';
    protected $fillable = [
        'userId',
        'title',
        'like',
        'comment_count'
    ];
    
    public function user(){
        return $this->belongsTo('App\User', 'userId', 'userId');
    }
}
