<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['book_id','user_id','quantity'];
    public function getIds(int $user_id){
        $ids = Cart::where('user_id','=',$user_id)->pluck("book_id")->toArray();
        return $ids;
    }
    public static function getCartList(int $user_id){
        $carts = Cart::join('books','carts.book_id','=','books.id')
                ->join('categories','books.category_id','=','categories.id') 
                ->where("carts.user_id","=",$user_id)
                ->select('carts.*',
                'books.price as book_price', 
                'books.name as book_name',
                'books.id as book_id',
                'categories.name as category',
                )
                ->get();
        return $carts;
    }
}
