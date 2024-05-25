<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['book_id','user_id','quantity'];
    public static function getCartList(int $user_id){
        $carts = Cart::join('books','carts.book_id','=','books.id')
                ->join('categories','books.category_id','=','categories.id') 
                ->where("carts.user_id","=",$user_id)
                ->select('carts.*',
                'books.price as book_price', 
                'books.promotional_price as book_promotional',
                'books.name as book_name',
                'books.id as book_id',
                'categories.name as category',
                )
                ->get();
        return $carts;
    }
   
    public static function getOneItem(int $user_id, int $item_id){
        $item = Cart::join('books','carts.book_id','=','books.id')
                ->join('categories','books.category_id','=','categories.id') 
                ->select('carts.*',
                'books.price as book_price', 
                'books.promotional_price as book_promotional',
                'books.name as book_name',
                'books.id as book_id',
                'categories.name as category',
                )
                ->where("carts.user_id","=",$user_id)
                ->where('book_id','=',$item_id)
                ->get()->first();
        return $item;
    }
    public static function getIds(int $user_id){
        $ids = Cart::where('user_id','=',$user_id)->pluck("book_id")->toArray();
        return $ids;
    }
}
