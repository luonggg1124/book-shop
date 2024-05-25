<?php 
namespace App\Repositories;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderRepository implements OrderRepositoryInterface{
    public function store(array $attr = []){
        $order = Order::create($attr);
        return $order;
    }

    public function listOrder(int $user_id){
        $list = Order::where("user_id","=",$user_id)->get();
        return $list;
    }
    public function store_details(array $attr = []){
        $cart = Cart::find($attr["cart_id"]);
        
        $order_detail = OrderDetail::create($attr['order_detail']);
        $cart->delete();
        return $order_detail;
    }

    public static function listOrderDetail(int $order_id){
        $list = OrderDetail::join('books',"order_details.book_id","=","books.id")
                            ->join('categories','books.category_id','=','categories.id') 
                            ->select(
                                "order_details.*",
                                'books.price as book_price', 
                                'books.promotional_price as book_promotional',
                                'books.name as book_name',
                                'books.id as book_id',
                                'categories.name as category',
                            )
                            ->where("order_details.order_id","=",$order_id)
                            ->get()
                            ;
        return $list;
        
    }

    public function cancel(int $order_id){
        $order = Order::find($order_id);
        $order->status = 5;
        $order->save();
        
    }
}