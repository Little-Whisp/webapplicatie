<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;
///**
// * The attributes that are mass assignable.
// *
// * @var array<int, string>
// */

    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    protected $fillable = ["name", "file_path", "created_at", "updated_at"];
}

