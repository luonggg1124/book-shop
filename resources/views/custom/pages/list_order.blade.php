<x-user-layout>
    <div class="app__container container__giohang ">
        <div class="grid">
            <div class="grid__row app__content">
                <div class="grid__column-2">
                    <nav class="category">
                        <h3 class="category__heading">
                            <i class="category__heading-icon fa-solid fa-list"></i>
                             Danh mục
                        </h3>
                        <ul class="category-list">
                            <li class="category-item ">
                                <a href="{{ route('cart.page',Auth::user()->account_name) }}" class="catogery-item__link">
                                   Giỏ hàng
                                </a>
                            </li>
                            <li class="category-item ">
                                <a href="{{ route('order.list') }}" class="catogery-item__link">
                                   Đơn hàng
                                </a>
                            </li>
                           
                        </ul>
                    </nav>
                </div>
                <div class="grid__column-10">
                    <div class="home-filter">
                        <p class="home-filter__giohang">Đơn hàng</p>
                        </div>
                        @if(count($list_order) > 0)
                        @foreach ($list_order as $order)
                            @php
                                if($order->status == 0){
                                    $status = "Chờ xác nhận";
                                }elseif($order->status == 1){
                                    $status = "Đã xác nhận";
                                }elseif($order->status == 2){
                                    $status = "Đang giao";
                                }elseif($order->status == 3){
                                    $status = "Đã giao";
                                }else{
                                    $status = "Đã hủy";
                                }
                                $listOrderDetail = \App\Repositories\OrderRepository::listOrderDetail($order->id);
                                
                                    if (strlen($order->address) > 36) {
                                        $address = substr($order->address, 0, 30) . '...';
                                    } else {
                                        $address = $order->address;
                                    }
                            @endphp
                       
                            
                        <div class="home-card" style="background-color: var(--white-color);">
                        <div class="home-card-id-order">
                            <p class="home-card-id-order-text">Đơn hàng : <span class="home-card-id-order-text-id">{{  $order->id }}</span></p>
                            <p class="home-card-id-order-text">Phí vận chuyển : <span class="home-card-id-order-text-id">1000đ</span></p>
                                <p class="home-card-id-day home-card-address">Địa chỉ giao hàng : <span class="home-card-id-day-a">{{$address}}</span></p>
                            <p class="home-card-id-day">Ngày tạo đơn : <span class="home-card-id-day-a">{{ $order->created_at }}</span></p>
                        </div>
                            <ul class="home-card-list home-card-list-donhang">
                                @foreach($listOrderDetail as $item) 
                                
                                   @php
                                        $total = 0;
                                        if($item->book_price == $item->book_promotional || $item->book_promotional == 0){
                                            $total += $item->book_price * $item->quantity;
                                        }else{
                                            $total += $item->book_promotional * $item->quantity;
                                        }
                                   @endphp
                                    
                                <li class="home-card-item">
                                    <div class="home-card-item-img">
                                        <img src="{{ asset('upload/product/truyentranh_thobaymauvanhungnguoinghinolaban.jpg') }}" alt="" class="home-card-item-image">
                                    </div>
                                    <div class="home-card-item-name"><p class="home-card-item-name-text">{{ $item->book_name }}</p></div>
                                    <div class="home-card-item-danhmuc"><p class="home-card-item-danhmuc-text">{{ $item->category }}</p></div>
                                    <div class="home-card-item-price">
                                        <div class="home-card-item-price-old"><p class="home-card-item-price-old-text">{{ number_format(intval($item->book_price),0,',','.') }}đ</p></div>
                                        <div class="home-card-item-price-new"><p class="home-card-item-price-old-text">{{ number_format(intval($item->book_promotional),0,',','.') }}đ</p></div>
                                    </div>
                                    <div class="home-card-item-quantity">
                                        <p class="home-card-item-quantity-number">Số lượng:</p>
                                        <input style="border: none;" readonly class="home-card-item-quantity-input" type="number" value="{{ $item->quantity }}">
                                    </div>
                                    <div class="home-card-item-thanhtien">
                                        <p class="home-card-item-thanhtien-text">Thành tiền : <span class="home-card-item-thanhtien-number">{{ $total }}đ</span></p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>   
                            
                            <div class="home-card-order">
                                <div class="home-card-order-trangthai"><p class="home-card-order-trangthai-text">Trạng thái : <span style="color:<?=$status != "Đã hủy"?' rgb(1, 121, 17)':"red"?>;" class="home-card-order-trangthai-text-a">{{$status}}</span></p></div>
                                
                                    @if ($status == 'Chờ xác nhận')
                                        <a href="{{ route('order.cancel',$order->id) }}" onclick="return confirm(`Bạn có chắc muốn hủy đơn hàng không?`)"  class="btn btn--primary">Hủy đơn hàng</a>
                                    @endif
                               
                                
                                <div class="home-card-order-tongtien"><p class="home-card-order-tongtien-text">Tổng tiền thanh toán: <span class="home-card-order-tongtien-number">{{ number_format(intval($order->total),0,',','.') }}đ</span></p></div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="layout__no-result">
                            <div>
                                <p class="no-result__message">There's no results at all</p>
                                    <div>
                                        <a href="{{ route('app.home') }}" class="btn">Back to home</a>
                                    </div>
                            </div>
                        </div>
                    @endif
                    </div>
                    
                    
                </div>
            </div>
        </div>
</x-user-layout>