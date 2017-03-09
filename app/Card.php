<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = [
        'card_name', 'skill', 'strength', 'defense',
    ];
}
