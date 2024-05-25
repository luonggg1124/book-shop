<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{    
     protected $orderRepository;
     public function __construct(OrderRepositoryInterface $orderRepository){
          $this->orderRepository = $orderRepository;
     }
    public function view(){
        if(Auth::user()){
          $user = User::find(Auth::user()->id);
        }else{
          return redirect()->route('app.login');
        }
        
       $listItem = [];
       if(session()->has('listItem')){
            $listItem = session()->get('listItem');

       }else{
            return redirect()->route('app.home');
       }
       config(['app.title' => $user->name.' | Order']);

       
       return view('custom.pages.order',[
        'listItem' => $listItem
       ]);
    }

    public function order(Request $request){
          if(Auth::user()){
               $user = User::find(Auth::user()->id);
          }else{
               return redirect()->route('app.home');
          }
          if(empty($user->address) || $user->address == ""){
               return redirect()->route('user.profile',$user->account_name)->withErrors(['address' => "Please!Enter your received address."]);
          }
          $attr = [
               "user_id" => $user->id,
               "address" => $user->address,
               "phone_number" => $user->phone_number,
               "total" => $request->total
          ];
          $order = $this->orderRepository->store($attr);
          $listItem = session()->get('listItem');
          session()->forget('listItem');
          
          foreach($listItem as $item){
               $attr_detail = [
                    "cart_id" => $item->id,
                    "order_detail" => [
                         "order_id" => $order->id,
                         "book_id" => $item->book_id,
                         "quantity" => $item->quantity
                    ]
               ];
               $order_detail = $this->orderRepository->store_details($attr_detail);
               
          }
          return redirect()->route('app.home')->with("success","Order successfully.");
        
    }
    public function view_ordered(){
          if(Auth::user()){
               $user = User::find(Auth::user()->id);
          }else{
               return redirect()->route('app.login');
          }
          $list_order = $this->orderRepository->listOrder($user->id);

          return view('custom.pages.list_order',[
               "list_order" => $list_order
          ]);

    }

    public function cancel(int $id){
          $this->orderRepository->cancel($id);
          return redirect()->back()->with("success","Order cancelled ");
    }

    
}
