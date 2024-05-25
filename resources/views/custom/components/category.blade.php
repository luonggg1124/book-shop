


<div class="grid__column-2">
    <nav class="category">
        <h3 class="category__heading">
            <i class="category__heading-icon fa-solid fa-list"></i>
             Danh mục
        </h3>
        <ul class="category-list">
           @foreach (\App\Models\Category::query()->get() as $item) 
           
            <li class="category-item ">
                <a href="{{ route('book.category',['name' => $item->name, 'id' => $item->id]) }}" class="catogery-item__link @if(isset($category_name) && $category_name == $item->name) category-item--active @endif">
                    {{ $item->name }}
                </a>
            </li>
            @endforeach
         
          
        </ul>
    </nav>
</div>