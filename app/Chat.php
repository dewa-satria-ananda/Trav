<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'chatId';
    protected $fillable = [
        'user_from',
        'user_to',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'user_from');
    }
}