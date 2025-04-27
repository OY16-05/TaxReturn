<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeComment(Comment $comment)
    {
     // ログインユーザーのidを取得
    $user_id = Auth::id();
     // ログインユーザーがそのコメントをいいねしているレコードを取得
    $liked_comment = $comment->likes()->where('user_id', $user_id);
     // 既に「いいね」しているか確認
    if (!$liked_comment->exists()) {
     //「いいね」していない場合は，likesテーブルにレコードを追加
    $like = new Like();
    $like->user_id = $user_id;
    $like->comment_id = $comment->id;
    $like->save();
    } else {
     // 既に「いいね」をしていた場合は，likesテーブルからレコードを削除
    $liked_comment->delete();
    }
     // いいねの数を取得
    $likes_count = $comment->likes->count();
    $param = [  'likes_count' =>  $likes_count, // いいねの数
    ];
    // フロントにいいねの数を返す
    return response()->json($param);
    }
}

