<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function add_to_cart(int $id,Request $request,Cart $cart){
        $items = $cart->getIds($request->user()->id);
       
        if(in_array($id, $items,$strict=true)){
            $item_cart = $cart->where('user_id', '=', $request->user()->id)
                        ->where('book_id', '=', $id)
                        ->get()->first();
            $book = \App\Models\Book::find($id);
            
            if($item_cart->quantity >= $book->quantity){
                $item_cart->update([
                    'quantity' => $book->quantity
                ]);
                return redirect()->back()->with('success','Sản phẩm đã đạt mức tối đa');
            }    
            $item_cart->update([
                'quantity' => $item_cart->quantity+1
            ]);
            
            return redirect()->back()->with('success','Thêm sản phẩm thành công vào giỏ hàng');
        }else{
            $data = [
                'book_id' => $id,
                'user_id' => $request->user()->id,
            ];
            $cart->create($data);
            return redirect()->back()->with('success','Thêm sản phẩm thành công vào giỏ hàng');
        }
    }


    public function delete_from_cart(int $id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success','Đã xóa sản phẩm từ giỏ hàng');
    }
}
