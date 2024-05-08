<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(int $id, Request $request){
        $data = $request->validate([
            'content' => 'required|string'
        ]);
        $data['user_id'] = auth()->id();
        $data['book_id'] = $id;
        $comment = Comment::create($data);
        return redirect()->back();
    }
}
