<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    //
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'deck_name',
    ];
}
