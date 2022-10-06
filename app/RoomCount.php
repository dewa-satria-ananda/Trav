<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCount extends Model
{
    protected $table = 'roomCount';
    protected $primaryKey = 'countId';
    protected $fillable = [
        'userId',
        'travTogetherId',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'userId');
    }

    public function trav()
    {
        return $this->belongsTo('App\TravTogether', 'TravTogetherId', 'TravTogetherId');
    }
}
