<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravTogether extends Model
{
    protected $table = 'travTogether';
    protected $primaryKey = 'travTogetherId';
    protected $fillable = [
        'userId',
        'title',
        'destination',
        'budget',
        'phone',
        'description',
        'people',
        'joinedPeople',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'userId', 'userId');
    }
}
