<x-user-layout>
    <div class="app__container">
        <div class="grid grid__information">
            <div class="information-heading">
                <p class="information-heading-text">Thông tin cá nhân</p>
            </div>
            <form action="{{ route('profile.update',$user->account_name) }}" class="information grid__row" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid__column-3 information__avt">
                    <div class="information-avatar">
                        <div class="information-image">
                            <img src="{{ $user->image ? asset('upload/user/'.$user->image) : asset('upload/user/default.jpg') }}" alt="" class="information-image__img">
                        </div>
                        <span class="btn information-avatar__change">
                            <input class="btn" name="image" type="file"  accept="image/*">
                            
                        </span>
                        <div class="d-flex j-center a-center">
                            @error('image')
                                <div class="text_update_validate"><p>{{ $message }}</p></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid__column-9">
                    <ul class="list__information">
                        <li class="list__information-item">
                            <span class="information__name-change">Tên người dùng :</span>
                            <div class="information__input-change">
                                <input type="text" name="name" value="{{ $user->name }}">
                                @error('name')
                                    <div class="text_update_validate"><p>{{ $message }}</p></div>
                                @enderror
                            </div>
                        </li>
                        <li class="list__information-item">
                            <span class="information__name-change ">Email:</span>
                            <div class="information__input-change">
                                <input type="text" readonly name="email" value="{{  $user->email }}" >
                                @error('email')
                                    <div class="text_update_validate"><p>{{ $message }}</p></div>
                                @enderror
                            </div>
                        </li>
                        <li class="list__information-item">
                            <span class="information__name-change">Địa chỉ :</span>
                            <div class="information__input-change">
                                <input type="text" name="address" value="{{ $user->address }}">
                                @error('address')
                                    <div class="text_update_validate"><p>{{ $message }}</p></div>
                                @enderror
                            </div>
                        </li>
                        <li class="list__information-item">
                            <span class="information__name-change">Số điện thoại :</span>
                            <div class="information__input-change">
                                <input type="text" name="phone_number" value="{{ $user->phone_number }}">
                                @error('phone_number')
                                    <div class="text_update_validate"><p>{{ $message }}</p></div>
                                @enderror
                            </div>
                        </li>
                        <li class="list__information-item">
                            <span class="information__name-change">Tên tài khoản :</span>
                            <div class="information__input-change">
                                <input type="text" class="nameAccount" name="account_name" value="{{ $user->account_name }}">
                                @error('account_name')
                                <div class="text_update_validate"><p>{{ $message }}</p></div>
                            @enderror
                            </div>
                        </li>
                    </ul>
                </div>
    
               <div class="btn__information-update">
                <button type="submit" class="btn btn__information-update-ok">Cập nhật</button>
                <button type="reset" class="btn btn__information-reset">Reset</button>
               </div>
            </form>
        </div>
       </div>
</x-user-layout>