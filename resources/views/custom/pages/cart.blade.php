<x-user-layout>
    <div class="app__container container__giohang">
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
                            <!-- category-item--active -->
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
                        <p class="home-filter__giohang">Giỏ hàng</p>
                    </div>
                    <div class="home-card">
                        <ul class="home-card-list">
                            @if(count($item_carts) > 0)
                            <form action="{{ route('cart.actioncheckbox') }}" method="POST">
                                @csrf
                                @method('POST')

                                @php
                                    $total = 0;
                                @endphp
                               @foreach ($item_carts as $item)
                                @php
                                    if($item->book_price == $item->book_promotional || $item->book_promotional == 0){
                                        $total += $item->book_price * $item->quantity;
                                    }else{
                                        $total += $item->book_promotional * $item->quantity;
                                    }
                                    
                                @endphp
                                    <li class="home-card-item">
                                        <input type="checkbox" class="home-card-inp-checkbox" name="items[]" value="{{ $item->book_id }}">
                                        <div class="home-card-item-img">
                                            <img src="{{ asset('upload/product/truyentranh_nhocmaruko.jpg') }}" alt="" class="home-card-item-image">
                                        </div>
                                        <div class="home-card-item-name">
                                            <p class="home-card-item-name-text">{{ $item->book_name }}</p>
                                        </div>
                                        <div class="home-card-item-danhmuc">
                                            <p class="home-card-item-danhmuc-text">{{ $item->category }}</p>
                                        </div>
                                        <div class="home-card-item-price">
                                           
                                            @if ($item->book_price == $item->book_promotional || $item->book_promotional == 0)
                                                <div class="home-card-item-price-old">
                                                    <p class="home-card-item-price-old-text">{{ number_format(intval($item->book_price),0,',','.') }} đ</p>
                                                </div>
                                            @else
                                                <div class="home-card-item-price-old">
                                                    <p class="home-card-item-price-old-text">{{ number_format(intval($item->book_price),0,',','.') }} đ</p>
                                                </div>
                                                <div class="home-card-item-price-new">
                                                    <p class="home-card-item-price-old-text">{{ number_format(intval($item->book_promotional),0,',','.') }} đ</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="home-card-item-quantity">
                                            <p class="home-card-item-quantity-number">Số lượng:</p>
                                            <input class="home-card-item-quantity-input" readonly style="border: none;" type="number" value="{{ $item->quantity }}">
                                        </div>
                                        <div class="btn btn-delete-cart">
                                            <a href="{{ route('cart.delete',$item->id) }}">Xóa</a>
                                        </div>
                                    </li>
                                    @endforeach
                                   
                        </ul>
                    </div>
                    <div class="home-filter__buyall" style="background-color: var(--white-color);">
                        <div class="home-filter__buyall-control">
                            <div class="home-card-item-delete">
                                <div class="home-card__muangay">
                                    
                                    <button name="delete" type="submit" class="btn home-card__btn-muangay">Xóa mục đã chọn</button>
                                </div>
                            </div>
                            <div class="home-card-item-delete">
    
                                <div class="home-card__muangay">
                                    
                                    <button name="buyselected" type="submit" class="btn btn--primary home-card__btn-muangay">Mua mục đã chọn</button>
    
                                </div>
                            </div>
                        </div>
                    
                        <div class="home-filter " style="background-color: var(--white-color);">
                            <span class="home-filter__buyall-tongtien-text">Tổng tiền : </span>
                            <label for="tongtien" class=""><i style="color: red; margin: 0 4px ;font-size: 1.4rem;" class="home-filter__label-tongtien fa-solid fa-dong-sign"></i></label>
                            <input class="home-filter__buyall-tongtien" type="text" name="total" value="@if(isset($total))   {{ number_format(intval($total),0,',','.') }}  @endif" readonly >
                            <button type="submit" name="all" class="btn home-filter__btn-buyall btn--primary">Mua tất cả</button>
                        </div>
                        </form>
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
    </div>
</x-user-layout>