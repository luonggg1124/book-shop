
@php
    use Illuminate\Support\Facades\DB;
    if (empty($books)) {
        $books = DB::table('books')->join('categories','books.category_id','=','categories.id')->select('books.*','categories.name as category')->paginate(10);
    }
@endphp
<x-app-layout>
    <div class="app__container">
        <div class="grid">
            <div class="grid__row app__content">
                @include('custom.components.category')
                <div class="grid__column-10">
                    <div class="home-filter">
                        <span class="home-filter__label">Sắp xếp theo</span>
                        <a href="{{ route('book.popular') }}" class="home-filter__btn btn {{ isset($popular) ? 'btn btn--primary' :'' }}">Phổ biến</a>
                        <a href="{{ route('book.new') }}" class="home-filter__btn btn  {{ isset($new) ? 'btn btn--primary' :'' }}">Mới nhất</a>
                        <!-- <button class="home-filter__btn btn">Bán chạy</button> -->
                        <div class="select-input">
                            <span class="select-input__label">Giá</span>
                            <i class="select-input__icon fas fa-angle-down"></i>
                            <ul class="select-input__list">
                                <li class="select-input__item">
                                    <a href="{{ route('book.low-to-high-price') }}" class="select-input__link">Giá thấp đến cao</a>
                                </li>
                                <li class="select-input__item">
                                    <a href="{{ route('book.high-to-low-price') }}" class="select-input__link">Giá cao đến thấp</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="home-product">
                        <div class="grid__row">
                            
                            @if (count($books) > 0)
                            @foreach ($books as $book)
                            @php
                                // just for example 
                                $percentage = rand(15,70);
                                $oldPrice = $book->price + ($book->price * ($percentage/100));
                            @endphp
                            <div class="grid__column-2-4">
                             <a href="" class="home-product-item">
                                 <div class="home-product-item__img" style="background-image: url('{{ asset('upload/product/sachhay_bachkhoathuvekhoahoc.jpg') }}') ;"></div>
                                 <h4 class="home-product-item__name">{{$book->name}} </h4>
                                 <div class="home-product-item__price">
                                     <span class="home-product-item__price-old">{{ number_format(intval($oldPrice),0,',','.') }}đ</span>
                                     <span class="home-product-item__price-current">{{ number_format(intval($book->price),0,',','.') }}đ</span>
 
                                 </div>
                                 <div class="home-product-item__action">
                                     <span class="home-product-item__like home-product-item__liked">
                                         <i class="home-product-item__like-icon-isset fa-solid fa-heart"></i> 
                                         <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                     </span>
                                     
                                    
                                 </div>
                                 <div class="home-product-item__origin">
                                     <span class="home-product-item__brand">Số Lượng: {{ $book->quantity }} </span>
                                     <span class="home-product-item__origin-name">{{ $book->publisher }}</span>
                                 </div>
                                 
                                 <div class="home-product-item__sale-off">
                                     <div class="home-product-item__sale-off-percent">{{ $percentage }}%</div>
                                     <span class="home-product-item__sale-off-label">Giảm</span>
                                 </div>
                             </a>
                            </div>
                            
                            @endforeach
                        @else
                        <div class="flex justify-center"><p class="fs-5 ">There's nothing here</p></div>
                        @endif
                          
                            
                           
                        </div>
                    </div>
                   
                    <ul class="pagination home-product__pagination">
                        {{ $books->links('') }}
                        {{-- <li class="pagination-item">
                            <a href="" class="pagination-item__link">
                                <i class="pagination-item__icon fas fa-angle-left"></i>
                            </a>
                            
                        </li>
                       
                        <li class="pagination-item  pagination-item--active ">
                            <a href="" class="pagination-item__link ">1</a>
                            
                        </li>
    
                        
                        <li class="pagination-item">
                            <a href="" class="pagination-item__link">
                                <i class="pagination-item__icon fas fa-angle-right"></i>
                            </a>
                            
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>