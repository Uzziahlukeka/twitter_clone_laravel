<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;


    //this allows us to put value in a dico 
    protected $fillable = [
        'content',
        'likes'
    ];
}
