<x-app-layout>
   
    
    <div class="app__container " >
        <div class="grid infor-flex" id="inforpd">
           <div class="grid__column-3">
               <div class="infor-product-left">
                   <div class="infor-product-left__item">
                       <img src="{{ asset('upload/product/truyentranh_narutoquyen72.jpg') }}" alt="" class="infor-product-left__img">
                   </div>
               </div>
           </div>
           <div class="grid__column-9">
               <div class="infor-product-right">
              
                    @csrf
                    <h3 class="infor-product-right__name">{{ $book->name }}</h3>
                    @if ($book->price == $book->promotional_price || $book->promotional_price == 0)
                    <div class="infor-product__right-price">
                        <h4 class="infor-product__right-price-number">{{ number_format(intval($book->price),0,',','.') }}đ</h4>
                    </div>
                    @else
                    <div class="infor-product__right-price-old">
                        <h4 class="infor-product__right-price-number"> {{ number_format(intval($book->price),0,',','.') }} đ</h4>
                    </div>
                    <div class="infor-product__right-price">
                        <h4 class="infor-product__right-price-number">{{ number_format(intval($book->promotional_price),0,',','.') }}đ</h4>
                    </div>
                    @endif
                   
                    <div class="infor-product__right-quantity">
                        <span class="infor-product__right-quantity-number">Số lượng:</span>
                        <input style="padding-left: 8px;" class="" type="number" name="quantity" value="1"  min="1" max="10">
                        <span class="infor-product__right-sanphamcosan">{{ $book->quantity }} sản phẩm có sẵn</span>
                    </div>
                    <div class="infor-product__right-btn">
                        @auth
                            <a href="{{ route('cart.add', $book->id) }}" class="infor-product__right-btn-add" id='btn-cart'>
                                <i class="fa-solid fa-cart-plus"></i>
                                Thêm vào giỏ hàng
                                </a>
                        @endauth
                        @guest
                            <a href="{{ route('app.login') }}" class="infor-product__right-btn-add" id='btn-cart' ><i class="fa-solid fa-cart-plus"></i>
                                Thêm vào giỏ hàng
                            </a>
                        @endguest
                            
                          
                        @auth
                            <a href="{{ route('order.one',$book->id) }}" class="infor-product__right-btn-buy">Mua ngay</a>
                        @endauth
                        @guest
                            <a href="{{ route('app.login') }}" class="infor-product__right-btn-buy infor-product__right-btn-buy-link">Mua ngay</a>
                        @endguest
                         
                           
                           
                          
                       </div>

                   
               </div>
           </div>
        </div>
        <div class="grid container__ctsp">
           <div class="container__ctsp-title">
               <p class="container__ctsp-title-text">Chi tiết sản phẩm</p>
           </div>
           <ul class="container__ctsp-list">
               <li class="container__ctsp-list-item">
                   Danh mục : {{ $book->category }}<span class="container__ctsp-list-item-primary"></span>
               </li>
               <li class="container__ctsp-list-item">
                   Nhà xuất bản : {{ $book->publisher }}<span class="container__ctsp-list-item-primary"></span>
               </li>
               <li class="container__ctsp-list-item">
                   Số lượng : {{ $book->quantity }}<span class="container__ctsp-list-item-primary"></span>
               </li>
               <li class="container__ctsp-list-item container__ctsp-list-item-mota">
                   Mô tả : {{ $book->description }}<span class="container__ctsp-list-item-primary "></span>
               </li>
           </ul>
        </div>
        <div class="grid container__ctsp">
           <div class="container__ctsp-title">
               <p class="container__ctsp-title-text">Bình luận</p>
               <form action="{{ route('user.comment',$book->id) }}" class="form__comments" method="POST">
                @csrf
                   <input class="form__comments-input" name="content" type="text" placeholder="Nhập bình luận" autocomplete="off"  id="">
                   @auth
                        <button type="submit" class="btn form__comments-btn">Gửi bình luận</button>
                    @endauth
                    @guest
                        <a href="{{ route('app.login') }}"class="btn form__comments-btn">Gửi bình luận</a>
                    @endguest
               </form>
           </div>
           <ul class="container__ctsp-list-comments">
           
                
            
              @foreach ($comments as $comment)
              <li class="container__ctsp-comment">
                <div class="container__ctsp-comment-user">
                    <div class="container__ctsp-comment-user-img">
                        <img src="{{ asset('upload/user/default.jpg') }}" alt="" class="container__ctsp-comment-user-image">
                    </div>
                    <div class="container__ctsp-user-name_time">
                        <p class="container__ctsp-comment-user-name">{{ Auth::user() && Auth::user()->id == $comment->user_id ? 'You' :$comment->user_name }}</p>
                    <p class="container__ctsp-comment-time">{{ $comment->created_at }}</p>
                    </div>
                </div>
                <span class="comment-content"><p class="container__ctsp-comment-user-content">{{ $comment->content }}</p></span>
                @if (Auth::user() && Auth::user()->id == $comment->user_id)
                    <a href="{{ route('comment.remove',$comment->id) }}" class="container__delete-comment">Xóa</a>
                @endif
            </li>
              @endforeach
           
             
           </ul>
        </div>
        <div class="grid container__ctsp">
           <div class="container__ctsp-heading"><h3 class="container__ctsp-heading">Sản phẩm cùng loại</h3></div>
           <div class="grid__row">
               <div class=" flex-same_product">
                   @foreach ($top10 as $book)
                   @php
                        $percentage = intval(($book->price - $book->promotional_price)/$book->price*100);
                    @endphp
                   <div class="grid__column-2-4" style="min-width: 224px;">
                    <a href="{{ route('book.details',['name'=> $book->name, 'id' => $book->id]) }}" class="home-product-item" >
                        <div class="home-product-item__img" style="background-image: url({{ asset('upload/product/sachhay_camnangtuduyphanbien.jpg') }});"></div>
                        <h4 class="home-product-item__name">{{ $book->name }}</h4>
                        <div class="home-product-item__price">
                            @if ($book->price == $book->promotional_price || $book->promotional_price == 0)
                                <span class="home-product-item__price-old">{{ number_format(intval($book->price),0,',','.') }}đ</span>
                            @else
                                <span class="home-product-item__price-old">{{ number_format(intval($book->price),0,',','.') }}đ</span>
                                <span class="home-product-item__price-current">{{ number_format(intval($book->promotional_price),0,',','.') }}đ</span>
                            @endif
                        </div>
                        <div class="home-product-item__action">
                            <span class="home-product-item__like home-product-item__liked">
                                <i class="home-product-item__like-icon-isset fa-solid fa-heart"></i> 
                                <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                            </span>
                            <!-- <div class="home-product-item__rating">
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class="home-product-item__rating-yellow fa-solid fa-star"></i>
                                <i class=" fa-solid fa-star"></i>
                            </div> -->
                            
                        </div>
                        <div class="home-product-item__origin">
                            <span class="home-product-item__brand">Số lượng: {{ $book->quantity }}</span>
                            <span class="home-product-item__origin-name">{{ $book->publisher }}</span>
                        </div>
                        
                        <div class="home-product-item__sale-off">
                            <div class="home-product-item__sale-off-percent">{{$percentage}}%</div>
                            <span class="home-product-item__sale-off-label">Giảm</span>
                        </div>
                    </a>
                </div>
                   @endforeach
                   
                   
                
               </div>
           </div>

        </div>
       </div>
      
</x-app-layout>