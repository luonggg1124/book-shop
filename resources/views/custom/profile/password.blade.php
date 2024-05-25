<x-user-layout>
    
    <div class="app__container">
        <div class="grid grid__information">
            <div class="information-heading">
                <p class="information-heading-text">Cập nhật mật khẩu</p>
            </div>
            <form action="{{ route('password.update',$user->account_name) }}" class="information grid__row" method="POST" enctype="multipart/form-data">
                @csrf
                    <ul class="list__information">
                        <li class="list__information-item">
                            <span class="information__name-change">Tên người dùng :</span>
                            <div class="information__input-change">
                                <input type="text" style="cursor: default;" readonly  value="{{ $user->name }}">
                            </div>
                        </li>
                        <li class="list__information-item">
                            <span class="information__name-change ">Email:</span>
                            <div class="information__input-change">
                                <input class="notemail" type="text" style="cursor: default;" readonly  value="{{ $user->email }}" >
                            </div>
                        </li>
                        <li class="list__information-item">
                            <span class="information__name-change">Tên tài khoản :</span>
                            <div class="information__input-change">
                                <input type="text" style="cursor: default;" readonly value="{{ $user->account_name }}">
                            </div>
                        </li>
                        <li class="list__information-item">
                            <span class="information__name-change">Mật khẩu cũ:</span>
                            <div class="information__input-change">
                                <input type="password" name="old_password">
                                @error('old_password')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </li> 
                        <li class="list__information-item">
                            <span class="information__name-change">Mật khẩu mới:</span>
                            <div class="information__input-change">
                                <input type="password" name="new_password">
                                @error('new_password')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </li>  
                        <li class="list__information-item">
                            <span class="information__name-change">Nhập lại mật khẩu:</span>
                            <div class="information__input-change">
                                <input type="password" name="retype_password">
                                @error('retype_password')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </li>  
                       
                    </ul>
           
    
               <div class="btn__information-update">
                <button type="submit" class="btn btn__information-update-ok">Cập nhật</button>
                <button type="reset" class="btn btn__information-reset">Reset</button>
               </div>
            </form>
        </div>
       </div>
</x-user-layout>