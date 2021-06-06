<div x-data="{ show: false }" @click.away="show = false">
    <button @click="show = ! show">
        {{ isset($categoryName) ? ucwords($categoryName)  : 'Categories' }}
    </button>

    <div x-show="show">
        @if($categories->count())
            @foreach($categories as $category)
                <a href="?category={{ $category->slug }}"
                   class="block text-left px-3 text-sm
                               leading-6 hover:bg-gray-300
                               focus:bg-gray-300
                                {{ isset($currentCategory) && $currentCategory->is($category)
                                    ? 'bg-blue-500 text-white' : '' }}">{{ $category->name }}</a>
            @endforeach
        @endif
    </div>
</div>
