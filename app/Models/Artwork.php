<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'detail', 'image', 'user_id'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
