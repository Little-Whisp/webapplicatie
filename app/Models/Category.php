<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $fillable = ['parent_id', 'name'];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }
}
