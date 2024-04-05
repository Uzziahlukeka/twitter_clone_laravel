<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;


    //this allows us to put value in a dico
    protected $fillable = [
        'user_id',
        'content',
        'likes'
    ];

    //relationships in laravel

    public function comments(){
        return $this->hasMany(Comment::class,'idea_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
