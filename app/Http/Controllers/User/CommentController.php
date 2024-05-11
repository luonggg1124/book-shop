<?php

namespace App\Http\Controllers\User;
use Carbon\Carbon;
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
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $comment = Comment::create($data);
        return redirect()->back();
    }

    public function remove(int $id){
        Comment::destroy($id);
        return redirect()->back();
    }
}
