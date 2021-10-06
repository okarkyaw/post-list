<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','author_id'];
    public function comments(){
        return $this->morphMany(Comment::class,'comment_table');
    }
    public function author()
    {
        return $this->belongsTo(Customer::class, 'author_id');
    }
}
