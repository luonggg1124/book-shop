<div class="header__cart">                    
    @if(isset(Auth::user()->id))
        @if(!\App\Models\Cart::where('user_id',Auth::user()->id)->exists())
            <div class="header__cart-wrap">
            <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
            <span class="header__cart-notice">0</span>
            <!-- No cart: header__cart-list--no-cart -->
            <div class="header__cart-list header__cart-list--no-cart">
                <img src="{{ asset('image_app/no_cart.png') }}" alt="" class="header__cart-no-cart-img">
                <span class="header__cart-list-no-cart-msg">Chưa có sản phẩm</span>
                
            </div>
        </div>
        @else
            
            <div class="header__cart-wrap">
            <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
            <span class="header__cart-notice">{{ count(\App\Models\Cart::getCartList(Auth::user()->id)) }}</span>
            <div class="header__cart-list ">
            <img src="{{ asset('image_app/no_cart.png') }}" alt="" class="header__cart-no-cart-img">
            <span class="header__cart-list-no-cart-msg">Chưa có sản phẩm</span>
            <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
            <ul class="header__cart-list-item">
                <!-- cart item -->
                @php
                    $total = 0;
                @endphp
                @foreach(\App\Models\Cart::getCartList(Auth::user()->id) as $item)
                @php
                    $total += $item->book_price * $item->quantity;
                @endphp
                   <li class="header__cart-item">
                    <img src="{{ asset('upload/product/truyentranh_honnhanhanhphuccuatoi.jpg') }}" alt="" class="header__cart-img">
                    <div class="header__cart-item-info">
                        <div class="header__cart-item-head">
                            <h5 class="header__cart-item-name">
                                {{ $item->book_name }}
                            </h5>
                            <div class="header__cart-item-price-wrap">
                                <span class="header__cart-item-price">{{ number_format(intval($item->book_price),0,',','.') }}đ</span>
                                <span class="header__cart-item-multiply">x</span>
                                <span class="header__cart-item-qnt">{{ $item->quantity }}</span>
                            </div>
                           
                        </div>
                        <div class="header__cart-item-body">
                            <span class="header__cart-item-description">
                                Danh mục : {{ $item->category }}
                            </span>
                            <span class="header__cart-item-delete">
                                <a href="{{ route('cart.delete',$item->id) }}" class="header__cart-item-delete-btn">Xóa</a>
                            </span>
                        </div>
                    </div>
                </li>
                @endforeach
               
            </ul>
            <div class="btn header__cart-sum-money">Tổng tiền : <p class="header__cart-sum-money-text">{{ number_format(intval($total),0,',','.') }}đ</p></div>
            <a href="home.php?act=giohang" class="btn btn--primary header__cart-view-cart">Xem giỏ hàng</a>
            </div>
        @endif
    @else

       <div class="header__cart-wrap">
        <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
        <span class="header__cart-notice">0</span>
        <!-- No cart: header__cart-list--no-cart -->
        <div class="header__cart-list header__cart-list--no-cart">
            <img src="{{ asset('image_app/no_cart.png') }}" alt="" class="header__cart-no-cart-img">
            <span class="header__cart-list-no-cart-msg">Chưa có sản phẩm</span>
            
        </div>
        </div>
    @endif
   



</div>