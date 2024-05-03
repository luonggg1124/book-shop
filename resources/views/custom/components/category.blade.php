


@php

use App\Models\Category;
$categories = Category::query()->get();

@endphp
<div class="grid__column-2">
    <nav class="category">
        <h3 class="category__heading">
            <i class="category__heading-icon fa-solid fa-list"></i>
             Danh mục
        </h3>
        <ul class="category-list">
            {{-- category-item--active --}}
           @foreach ($categories as $item)
               
           
            <li class="category-item ">
                <a href="" class="catogery-item__link">
                    {{ $item->name }}
                </a>
            </li>
            @endforeach
         
          
        </ul>
    </nav>
</div>