<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   
    public function add_to_cart(int $id){
        $items = Cart::getIds(request()->user()->id);
       
        if(in_array($id, $items,$strict=true)){
            $item_cart = Cart::where('user_id', '=', request()->user()->id)
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
            
            return redirect()->back()->with('success','Product added to the cart');
        }else{
            $data = [
                'book_id' => $id,
                'user_id' => request()->user()->id,
            ];
            Cart::create($data);
            return redirect()->back()->with('success','Product added to the cart.');
        }
    }


    public function delete_from_cart(int $id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success','Product removed from the cart.');
    }

    public function cartPage(string $account_name){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
        }else{
            return redirect()->route('app.home');
        }
       if($user->account_name != $account_name){
            abort(403);
       }
       config(['app.title' => $user->name.' | Cart']);
       $item_carts = Cart::getCartList($user->id);
       return view('custom.pages.cart',[
        'item_carts'=> $item_carts
       ]);
        
    }

    public function actionCheckbox(Request $request){
        $user = User::find(Auth::user()->id);
        if($request->has('buyselected')){
            $idItems = $request->items;
            $list = [];
           
            foreach($idItems as $id){
                $list[] = Cart::getOneItem($user->id,$id);
            }
           
           
            session(["listItem" => $list]);
            return redirect()->route('order');

        }
        if($request->has('delete')){
            $idItems = $request->items;
            foreach($idItems as $id){
                $item = Cart::getOneItem($user->id,$id);
                $itemModel = Cart::find($item->id);
                $itemModel->delete();
            }
            return redirect()->back()->with(["success" => "Đã xóa sản phẩm"]);
        }

        if($request->has('all')){
            $list = Cart::getCartList($user->id);
            session(["listItem" => $list]);
            return redirect()->route('order');
        }
    }

    public function orderOne(int $id){
        if(Auth::user())
        $user = User::find(Auth::user()->id);
        else return redirect()->route('app.home');
        $list = [];

        $this->add_to_cart($id);

        $item = Cart::getOneItem($user->id,$id);

        $list[] = $item;

        session(["listItem" => $list]);
        
        return redirect()->route('order');
  }
}
