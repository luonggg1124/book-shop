<x-app-layout>
    <div class="app__container">
        <div class="grid">
            <div class="grid__row app__content">
                @include('custom.category')
                <div class="grid__column-10">
                    <div class="home-filter">
                        <span class="home-filter__label">Sắp xếp theo</span>
                        <a href="home.php?act=phobien" class="home-filter__btn btn btn--primary">Phổ biến</a>
                        <a href="home.php" class="home-filter__btn btn ">Mới nhất</a>
                        <!-- <button class="home-filter__btn btn">Bán chạy</button> -->
                        <div class="select-input">
                            <span class="select-input__label">Giá</span>
                            <i class="select-input__icon fas fa-angle-down"></i>
                            <ul class="select-input__list">
                                <li class="select-input__item">
                                    <a href="" class="select-input__link">Giá thấp đến cao</a>
                                </li>
                                <li class="select-input__item">
                                    <a href="" class="select-input__link">Giá cao đến thấp</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="home-product">
                        <div class="grid__row">
                            <!-- product column 2-4 phần sản phẩm copy cả grid__column-2-4 -->
                           
                            <div class="grid__column-2-4">
                                <a href="" class="home-product-item">
                                    <div class="home-product-item__img" style="background-image: url();"></div>
                                    <h4 class="home-product-item__name">Tên Sản Phẩm</h4>
                                    <div class="home-product-item__price">
                                        <span class="home-product-item__price-old">Giá cũ</span>
                                        <span class="home-product-item__price-current">Giá mới</span>
    
                                    </div>
                                    <div class="home-product-item__action">
                                        <span class="home-product-item__like home-product-item__liked">
                                            <i class="home-product-item__like-icon-isset fa-solid fa-heart"></i> 
                                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                        </span>
                                        
                                       
                                    </div>
                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand">Số Lượng:11 </span>
                                        <span class="home-product-item__origin-name">abc</span>
                                    </div>
                                    
                                    <div class="home-product-item__sale-off">
                                        <div class="home-product-item__sale-off-percent">12%</div>
                                        <span class="home-product-item__sale-off-label">Giảm</span>
                                    </div>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                    <ul class="pagination home-product__pagination">
                        <li class="pagination-item">
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
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>