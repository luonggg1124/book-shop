<x-user-layout>
    <div class="app__container container__giohang ">
        <div class="grid">
            <div class="grid__row app__content">
                <div class="grid__column-2">
                    <nav class="category">
                        <h3 class="category__heading">
                            <i class="category__heading-icon fa-solid fa-credit-card"></i>
                            Phương thức thanh toán
                        </h3>
                        <select name="" >
                            <option value="1">Thanh toán khi nhận hàng</option>
                            <option value="2">Chưa cập nhật </option>
                        </select>
                    </nav>
                </div>
                <div class="grid__column-10">
                    <div class=" home-filter-information-receive">
                        <div class="home-filter-information-receive-header">
                            <i class="information-receive-header-icon fa-solid fa-location-dot"></i>
                            <p class="information-receive-header-text">Thông tin nhận hàng</p>
                        </div>
                        <form action="{{ route('order.post') }}" method="POST">
                            @csrf
                            
                            <div class="home-filter-information-receive-content">
                                <div class="home-filter-information-receive-content-name-phone">
                                    <p class="home-filter-information-receive-content-name">{{ Auth::user()->name }}</p>
                                    <p  class="home-filter-information-receive-content-phone">{{ Auth::user()->phone_number }}  </p>
                                </div>
                                <div class="home-filter-information-receive-content-address">
                                    <p >{{ Auth::user()->address ?? "Hãy thêm địa chỉ nhận hàng" }}</p>
                                </div>
                                <div class="home-filter-information__change">
                                    <a href="{{ route('user.profile', Auth::user()->account_name ) }}" >Thay đổi</a>
                                </div>
                            </div>
                    </div>
                    <div class="home-filter">
                        <p class="home-filter__giohang">Sản phẩm</p>
                    </div>
                    <div class="home-card" style="background-color: var(--white-color);">
    
                        <ul class="home-card-list home-card-list-donhang">
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($listItem as $item)
                                @php
                                    if($item->book_price == $item->book_promotional || $item->book_promotional == 0){
                                        $total += $item->book_price * $item->quantity;
                                    }else{
                                        $total += $item->book_promotional * $item->quantity;
                                    }
                                @endphp
                           
                                <li class="home-card-item">
                                    <div class="home-card-item-img">
                                        <img src="{{ asset('upload/product/truyentranh_thanhguomdietquy_doahoahanhphuc.jpg') }}" alt="" class="home-card-item-image">
                                    </div>
                                    <div class="home-card-item-name">
                                        <p class="home-card-item-name-text">{{ $item->book_name }}</p>
                                    </div>
                                    <div class="home-card-item-danhmuc">
                                        <p class="home-card-item-danhmuc-text">{{ $item->category }}</p>
                                    </div>
                                    <div class="home-card-item-price">
                                        <div class="home-card-item-price-old">
                                            <p class="home-card-item-price-old-text">{{ number_format(intval($item->book_price),0,',','.') }}đ</p>
                                        </div>
                                        <div class="home-card-item-price-new">
                                            <p class="home-card-item-price-old-text">{{ number_format(intval($item->book_promotional),0,',','.') }}đ</p>
                                        </div>
                                    </div>
                                    <div class="home-card-item-quantity">
                                        <p class="home-card-item-quantity-number">Số lượng:</p>
                                        <input style="border: none;" readonly class="home-card-item-quantity-input" min="1" max="10" type="number" value="{{ $item->quantity }}">
                                    </div>
                                    <div class="home-card-item-thanhtien">
                                        <p class="home-card-item-thanhtien-text">Thành tiền : <span class="home-card-item-thanhtien-number">{{ number_format(intval($item->book_promotional * $item->quantity),0,',','.') }}đ</span></p>
                                    </div>
                                </li>
                                @endforeach
                        </ul>
                        
                        <div class="home-card-order">
                            <div class="home-card-order-tongtien">
                                <p class="home-card-order-tongtien-text">Tổng tiền : <span class="home-card-order-tongtien-number">{{ number_format(intval($total),0,',','.') }}đ</span></p>
                            </div>
                            <input type="hidden" readonly name="total" value="{{$total}}">
                            <button type="submit" onclick="return confirm(`Bạn có chắc muốn đặt hàng?`)" class="btn btn--primary" style="margin-right:40px" >Đặt hàng</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>