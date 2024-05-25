<x-guest-layout>
    <div class="modal" >
        <div class="modal__overlay"></div>
            <div class="modal__body">
                <div  class="auth-form auth-form-register" >
                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <div class="auth-form__container">
                            <div class="auth-form__header">
                                <h3 class="auth__heading">Đăng ký</h3>
                                <a href="{{ route('app.login') }}" style="text-decoration: none;" class="auth-form__switch-btn">Đăng nhập</a>
                            </div>
                            <div class="auth-form__group">
                                    <label class="auth-form__group-label" for="email">Email:</label>
                                    <input id="email" name="email" type="text" placeholder="Nhập email của bạn" class="auth-form__input">
                                    @error('email')
                                        <span class="auth-form__form-masage">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="auth-form__group">
                                    <label class="auth-form__group-label" for="password">Mật khẩu:</label>
                                    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu của bạn" class="auth-form__input">
                                    @error('password')
                                        <span class="auth-form__form-masage">{{ $message }}</span>
                                    @enderror
                                </div>
                            <div class="auth-form__form">
                                <div class="auth-form__group ">
                                    <label class="auth-form__group-label" for="fullname">Tên hiển thị:</label>
                                    <input id="fullname" name="name" type="text" placeholder="Nhập tên của bạn" class="auth-form__input">
                                    @error('name')
                                        <span class="auth-form__form-masage">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="auth-form__group">
                                    <label class="auth-form__group-label" for="phone">Số điện thoại:</label>
                                    <input id="phone" name="phone_number" type="text" placeholder="Nhập số điện thoại của bạn" class="auth-form__input">
                                    @error('phone_number')
                                        <span class="auth-form__form-masage">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="auth-form__group">
                                    <label class="auth-form__group-label" for="address">Địa chỉ:</label>
                                    <input id="address" name="address" type="text" placeholder="Nhập địa chỉ của bạn" class="auth-form__input">
                                   
                                </div>
                            </div>
                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng kí, bạn đã đồng ý với Fpoly về
                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ </a>&
                                <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                            </p>
                        </div>
                        <div class="auth-form__controls">
                            <a href="{{ $url }}" class="btn auth-form__controls-back btn--nomals">TRỞ VỀ</a>
                            <button type="submit" class="btn btn--primary">ĐĂNG KÝ</button>
                        </div>
                    </div>
                </form>  
            </div>  
        </div>
    </div> 
</x-guest-layout>