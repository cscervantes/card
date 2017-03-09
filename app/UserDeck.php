<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDeck extends Model
{
    //
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'deck_id', 'card_id',
    ];

    public function deck()
    {
        return $this->hasMany('App\Deck', 'id', 'deck_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function card()
    {
        return $this->hasMany('App\Card', 'id', 'card_id');
    }

}
