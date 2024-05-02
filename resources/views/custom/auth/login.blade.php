<x-guest-layout>
    

<div class="modal" >
    <div class="modal__overlay"></div>
    <div class="modal__body">
                <div class="auth-form" >
                    <form action="" method="POST">
                        <div class="auth-form__container">
                            <div class="auth-form__header">
                                <h3 class="auth__heading">Đăng nhập</h3>
                                <a href="home.php?act=register" style="text-decoration: none;" class="auth-form__switch-btn">Đăng ký</a>
                            </div>
                            <div class="auth-form__form">
                                <div class="auth-form__group">
                                    <label class="auth-form__group-label" for="email">Email:</label>
                                    <input name="email" type="text" placeholder="Nhập email của bạn" class="auth-form__input">
                                    <span class="auth-form__form-masage"></span>
                                </div>
                                <div class="auth-form__group">
                                <label class="auth-form__group-label" for="password">Mật khẩu:</label>
                                    <input name="password" type="password" placeholder="Nhập mật khẩu của bạn" class="auth-form__input">
                                    <span class="auth-form__form-masage"></span>
                                </div>
                            </div>
                            <div class="auth-form__aside">
                               <div class="auth-form__help">
                                <a href="home.php?act=quenmatkhau" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                
                               </div>
                            </div>
                            <div class="auth-form__controls">
                                <a href="home.php" class="btn auth-form__controls-back btn--nomals">TRỞ VỀ</a>
                                <button name="dangnhap" type="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="auth-form__socials">
                        
                    </div>
                </div> 
            </div> 
</div> 
</x-guest-layout>