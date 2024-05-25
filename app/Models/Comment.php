<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ["content","user_id","book_id","created_at","updated_at"];

    public static function getComments($id){
        $comments = Comment::join('users','comments.user_id','=','users.id')
        ->select('comments.*','users.name as user_name')
        ->where('comments.book_id','=', $id)
        ->orderBy('comments.created_at','DESC')
        ->paginate(10)
        ;
        return $comments;
    }
}
