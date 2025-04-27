<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment_id'];

    // リレーション (Like belongs to a Comment)
    public function Comment()
    {
    return $this->belongsTo(Comment::class);
    }
    
   // リレーション (Like belongs to a User)
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
