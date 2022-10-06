<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatText extends Model
{
    protected $table = 'chat_text';
    protected $primaryKey = 'chatTextId';
    protected $fillable = [
        'user_from',
        'user_to',
        'text',
        'chatId',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'user_from');
    }
    public function chatId()
    {
        return $this->belongsTo('App\Chat', 'chatId', 'chatId');
    }
}
