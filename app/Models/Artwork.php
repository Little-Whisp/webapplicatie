<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Artwork
 *
 * @mixin Eloquent
 */

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'detail', 'image'
    ];

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

//    public function user() {
//        return $this->belongsTo('App\User');
//    }

//    public function category() {
//        return $this->belongsTo('App\Category');
//    }

}


