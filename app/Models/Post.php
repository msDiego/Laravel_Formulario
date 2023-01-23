<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    use HasFactory;


    protected $fillable = [ 'titulo', 'extracto', 'contenido', 'publico'];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function comment(){

        return $this->hasMany(Comment::class);
    }
}
